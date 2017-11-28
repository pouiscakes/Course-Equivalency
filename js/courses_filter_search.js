function filterSearch() {
  var input, filter, table, tr, a, i;
  input = document.getElementById('course_search');
  console.log(input);
  filter = input.value.toUpperCase();
  table = document.getElementById("course_list");
  tr = table.getElementsByTagName('tr');

  for(i = 1; i < tr.length; i++) {
    // a = tr[i].getElementsByTagName("a")[0];
    alert(tr[i]);
    if(tr[i].innerHTML.toUpperCase().indexOf(filter) > -1) { 
      tr[i].style.display = "";
    }
    else {
        tr[i].style.display = "none"; 
    }
  }
}