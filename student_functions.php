<script>  
// JavaScript and jQuery for editing data in tables
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"student_select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 
 });  
 </script>