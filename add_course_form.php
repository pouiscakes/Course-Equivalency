	<button onclick="toggle_form()">Add a Course</button>
	<div id="add_course_form">
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