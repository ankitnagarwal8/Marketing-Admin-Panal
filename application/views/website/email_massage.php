<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <?php include('links.php'); ?>
    <style type="text/css">
      .project_container{
        padding: 2rem;
        margin-top: 6rem;
      }
      .project{
        width:100%;
        background: white;
        margin-top: 20px;
        padding: 1vh;
        padding-left: 2rem;
        border-radius: 10px;
        display: flex;
        height: auto;
        
      }
      .project_name{
        padding-left: 2rem;
        width: 100px;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width:30%;
      }
      .project_contant{
        cursor: pointer;
        height:auto;
        width:30%;
        padding-left: 4rem;
        text-align: cneter;
      }
      .compaing_data{
        width:100%;
        padding: 1rem;
        float: right;
      }
      .project_contant_details {
        width:30%;
      }
      .project_contant_details a{
        float: right;

      }

    
    .compaing_data .camping_head button{
        height: 4rem;
        width:10rem;
        float: right;
        background: blue;
        font-size: 15px;
        border: none;

    }
    .compaing_data .camping_head button a{
        padding: 0.2rem;
        text-decoration: none;
        color: #fff;
        height: 2rem;
        width:1rem;
    }
    #more-para
      {
        display: none;
      }

    </style>
</head>
<body>
	  <?php include('header.php'); ?>

	  <div class="compaing_data">
	  	<div class="camping_head">
	  		<button><a href="<?= base_url('USER/CREATE_COMPAING'); ?>">create campaing</a></button>
	  	</div>
	  </div>
    <div class="project_container">
      <?php foreach ($results as $result){ ?>
      <div class="project">
        <div class="project_name">
          <h2><a href="<?= base_url(''); ?>"><?php echo $result['title']; ?></a></h2>
        </div>
        <div class="project_contant">
          <p><?php echo $result['contant']; ?></p>
        </div>
        <div class="project_contant_details">
          <a href='<?= base_url("USER/CREATE_COMPAING/edit/".$result['id']); ?>'>view more details</a>
          <a href='<?= base_url("USER/CREATE_COMPAING/delete/".$result['id']); ?>'>DELETE</a>
        </div>
      </div>
    <?php } ?>
    </div>

	  </section>


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
function moreLess(e) {
    e.preventDefault()
    var dots = document.querySelector("#para-dots");
    var morePara = document.querySelector("#more-para");
    var btnPara = document.querySelector("#btn");

    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnPara.innerHTML = "Read More..."; 
      morePara.style.display = "none";
    } else {
      dots.style.display = "none";
      btnPara.innerHTML = "&lt;&lt; Less"; 
      morePara.style.display = "inline" ;
    }
  }


</script>
</body>
</html>