

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php'); ?>
  <style type="text/css">
    /*#user_data{
      width:100%;
/*      background-color: ;
      padding: 20px;
    }*/
    /*.table_heading{
      padding: 2rem;
      display: flex;
      background-color: white;
    }
    .page_data_search{
      float: right;
    }
    .massage{
     white-space: nowrap; 
      overflow: hidden;
      text-overflow: ellipsis; 
/*  border: 1px solid #000000;*/
    }*/
    /*.table_data{
      width:100%;
      height:auto;
      
     
      overflow-x: scroll;
      overflow-y: scroll;
    }
    table{
      background-color: lightblue;
    }
    table th{
      background-color: lightgoldenrodyellow;
      width: auto;
      height:40px;
    }
    table td{
      background-color: lightgoldenrodyellow;
      width: auto;
      height:10px;
    }*/
  </style>
    
</head>
<body>
	<?php include('header.php'); ?>
  
	
  <div id="user_data">
    <div class="table_heading">
      <form method='post' action="<?= base_url() ?>USER/REPORTS/index" >
      <div class="page_data_show">
      <?php 
      $options = [
              '10'  => '10',
              '5'  => '5',
              '3'  => '3',
              '50'    => '50',
              '100'  => '100'
          ];

          echo form_dropdown('rowintable', $options, 'large');
        ?>
      </div>
      <div class="page_data_search">
        
          <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
        </form>
      </div>
    </div>
      <div class="table_data">
        <table border="1px solid black" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Catagary</th>
                            <th>Campaing</th>
                            <th>Sending Email</th>
                            <th>Subject</th>
                            <th>Massage</th>
                            <th>Sending Date</th>
                            <th>Delivered</th>
                            <th>Delivered Date</th>
                            <th>Opening Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $author): ?>
                            <tr>
                                <td><?php echo $author['id'] ?></td>
                                <td><?php echo $author['name'] ?></td>
                                <td><?php echo $author['email'] ?></td>
                                <td><?php echo $author['catagary'] ?></td>
                                <td><?php echo $author['camaping'] ?></td>
                                <td><?php echo $author['sending_email'] ?></td>
                                <td><?php echo $author['subject'] ?></td>
                                <td style="overflow: hidden; text-overflow: ellipsis;"><?php echo $author['massage'] ?></td>
                                <td><?php echo $author['sending_date'] ?></td>
                                <td><?php echo $author['delivered'] ?></td>
                                <td><?php echo $author['delivered_date'] ?></td>
                                <td><?php echo $author['opening_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

         <p> <?php echo $pagination; ?></p>
      </div>
    </div>
  <!-- </div> -->
  










</div>


<script>
 	let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += "responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>