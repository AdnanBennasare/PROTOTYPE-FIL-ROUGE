<?php
include "../managers/GestionTask.php";
include "../managers/GestionProject.php";

$gestion_task = new GestionTask();
$gestion_project = new GestionProject();
$project_id = $_GET['project_id'] ?? "";

$page = $_GET['page'] ?? 1; // default page number is 1
$page_size = 3; // number of tasks to show per page
$offset = ($page - 1) * $page_size; // calculate the offset for the SQL query

if ($project_id == "") {
    $tasks = $gestion_task->RechercherTousPagines($page_size, $offset);
} else {
    $tasks = $gestion_task->RechercherParProjetPagines($project_id, $page_size, $offset);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/style.css">
    <script
      src="https://kit.fontawesome.com/c7a60e43cd.js"
      crossorigin="anonymous"
    ></script>
    <title>Gestion des tasks</title>
</head>
<body>
<div class="container w-50 mt-5">

<div class="d-flex justify-content-between mb-5">
<select class="form-select w-25" id="project-select" onchange="filterTasksByProject()">
    <option value="">All Projects</option>
    <?php
    $gestion_project = new GestionProject();
    $projects = $gestion_project->RechercherTous();
    foreach ($projects as $project) {
        echo '<option value="'.$project->getId().'">'.$project->getNom().'</option>';
    }
    ?>
   </select>

<form id="search-form">
  <div class="input-group">
    <input type="text" class="form-control" id="search-input" placeholder="Search tasks">
  </div>
</form>
</div>
 <!--div where i show my table  -->
 <div id="tasks-container">
  <table class="table mt-5" id="tasks-table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- your tasks rows here -->
    </tbody>
  </table>
  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item" id="prev-page"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item" id="next-page"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<script>
function filterTasksByProject(page = 1) {
    var project_id = document.getElementById("project-select").value;
    var query = document.getElementById("search-input").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tasks-table").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "filter_tasks_by_project.php?project_id="+project_id+"&q="+query+"&page="+page, true);
    xhttp.send();
}

function searchTasks(page = 1) {
  var query = document.getElementById("search-input").value;
  console.log(query);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tasks-table").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "search_tasks.php?q="+query+"&page="+page, true);
  xhttp.send();
}

document.getElementById("search-form").addEventListener("submit", function(event) {
  event.preventDefault();
  searchTasks();
});

document.getElementById("prev-page").addEventListener("click", function() {
  var currentPage = parseInt(document.querySelector(".pagination .active").textContent);
  if (currentPage > 1) {
    filterTasksByProject(currentPage - 1);
  }
});

document.getElementById("next-page").addEventListener("click", function() {
  varcurrent_page = parseInt(document.getElementById("current-page").innerHTML);
var max_page = parseInt(document.getElementById("max-page").innerHTML);if (current_page < max_page) {
  current_page++;
  document.getElementById("current-page").innerHTML = current_page;
  loadTasks(current_page);
}
});

document.getElementById("previous-page").addEventListener("click", function() {
var current_page = parseInt(document.getElementById("current-page").innerHTML);

if (current_page > 1) {
current_page--;
document.getElementById("current-page").innerHTML = current_page;
loadTasks(current_page);
}
});

function loadTasks(page) {
var project_id = document.getElementById("project-select").value;
var query = document.getElementById("search-input").value;

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
document.getElementById("tasks-container").innerHTML = this.responseText;
}
};

xhttp.open("GET", "load_tasks.php?page=" + page + "&project_id=" + project_id + "&q=" + query, true);
xhttp.send();
}

loadTasks(1); // Load initial tasks on page load
</script>