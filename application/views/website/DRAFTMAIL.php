<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php'); ?>
  <style type="text/css">
    #user_data{
      width:100%;

      padding: 20px;
    }
    .table_heading{
      padding: 2rem;
      display: flex;
      background-color: white;
    }
    .page_data_search{
      float: right;
    }
  </style>
    
</head>
<body>
	<?php include('header.php'); ?>
  
  <div id="user_data">
    <div class="table_heading">
      <form method='post' action="<?= base_url() ?>USER/DRAFTMAIL" >
      <div class="page_data_show">
      <?php 
      $options = [
              '10'  => '10',
              '5'  => '5',
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
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Massage</th>
                            <th>CAMAPING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $author): ?>
                            <tr>
                                <td><?= $author['id']; ?></td>
                                <td><?= $author['subject'] ?></td>
                                <td><?= $author['massage'] ?></td>
                                <td><?= $author['camaping'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

         <p> <?= $pagination; ?></p>
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