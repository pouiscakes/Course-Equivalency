	<button id="add_course_button" onclick="toggle_form()">+ Add Course</button>
	<div class="add_course_form" id="add_course_form" style="display: none;">
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" >
			Outside School * <input type="text" name="outside_school"><br>
			Outside Course * <input type="text" name="outside_course"><br>
			SCU Course * <input type="text" name="scu_course"><br>
			Equivalent * <select id="equivalent" name="equivalent">
							<option value="NO"> NO</option>
							<option value="YES"> YES</option>
						</select>
			Notes <input type="text" name="notes"><br>
			<input class="button" type="submit">
		</form>
	</div>

	<script>
		function toggle_form() 
	      {
	          var x = document.getElementById("add_course_form");
	          var y = document.getElementById("add_course_button");

	          if (x.style.display == "none") {
	              x.style.display = "block";
	              y.innerHTML = "Done Adding Course";
	          } else {
	              x.style.display = "none";
	              y.innerHTML = "+ Add Course";
	          }
	      }
	</script>