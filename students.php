<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <?php
    include("menu.php");?>

    <a href="student_add.php">Add Student</a>

    <table border="1" id="students">
        <thead>
            <tr>
            <td colspan="4">All Students</td>
            </tr>
            
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Program</td>
            <td colspan="2">Action</td>
        </tr>
<tr>
            <td colspan="4"><input type="text" id="searchInput" placeholder="Search for names.." onkeyup="searchTable()">
           </td>
        </tr>
        </thead>
        
        
    </table>
    <script>
        fetch("http://localhost/atika/api/student_list.php").then(function(response){
        return response.json();
    }).then(function(data){
    
        let students = document.getElementById("students");
        data.forEach((each_student,index)=>{
            let row = students.insertRow(2+index);

            let td_1 = row.insertCell(0);
            td_1.innerHTML = each_student.sid;
            
            let td_2 = row.insertCell(1);
            td_2.innerHTML = each_student.name;

            let td_3 = row.insertCell(2);
            td_3.innerHTML = each_student.program;

            let td_4 = row.insertCell(3);
            td_4.innerHTML = "<button>Edit</button> <button>Delete</button>";
        });
    });
     function searchTable() {
             // Get the search input element
            var input = document.getElementById('searchInput');
         // Get the search query and convert to uppercase for case insensitive comparison
             var filter = input.value.toUpperCase();
             // Get the table element
             var table = document.getElementById('students');
             // Get all the rows in the table's body
             var tr = table.getElementsByTagName('tr');

            // Loop through all table rows, and hide those that don't match the search query
            for (var i = 1; i < tr.length; i++) {
            // Get the first cell (Name) in the current row
                 var td = tr[i].getElementsByTagName('td')[0];
                 if (td) {
                     var txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                         tr[i].style.display = '';
                     } else {
                         tr[i].style.display = 'none';
                     }
                 }
             }
         }

    </script>
    </center>
</body>
</html>