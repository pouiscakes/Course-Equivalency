<script>  
// JavaScript and jQuery for editing data in tables
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
           });  
      }  
      $(document).on('blur', '.outside_school', function(){  
           var id = $(this).data("id1");  
           var outside_school = $(this).text();  
           edit_data(id, outside_school, "outside_school");  
      });  
      $(document).on('blur', '.outside_course', function(){  
           var id = $(this).data("id2");  
           var outside_course = $(this).text();  
           edit_data(id,outside_course, "outside_course");  
      });
      $(document).on('blur', '.scu_course', function(){  
           var id = $(this).data("id3");  
           var scu_course = $(this).text();  
           edit_data(id,scu_course, "scu_course");  
      }); 
      $(document).on('blur', '.equivalence', function(){  
           var id = $(this).data("id4");  
           var equivalence = $(this).text();  
           edit_data(id,equivalence, "equivalence");  
      }); 
      $(document).on('blur', '.notes', function(){  
           var id = $(this).data("id5");  
           var notes = $(this).text();  
           edit_data(id,notes, "notes");  
      });
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           // if(confirm("Are you sure you want to delete this?"))  
           // {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          // alert(data);  
                          fetch_data();  
                     }  
                });  
           // }  
      });   
 });  
 </script>