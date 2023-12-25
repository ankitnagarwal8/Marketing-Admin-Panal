<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <?php include('links.php'); ?>
   </head>
<body>
  <?php include('header.php'); ?>
  	<div class="home">
      <div class="deshbord">
        <div class="deshbord_container">
          <div class="deshbord_container_items">
              <div class="deshbord_container_items_icon"><i class="fa-solid fa-envelopes-bulk icon"></i></div>
              <div class="deshbord_container_items_data"><h2>4043</h2></div>
          </div>
        </div>

        <div class="deshbord_container">
          <div class="deshbord_container_items2">
              <div class="deshbord_container_items_icon"><i class="fa-brands fa-whatsapp icon"></i></div>
              <div class="deshbord_container_items_data"><h2>2003</h2></div>
          </div>
        </div>

        <div class="deshbord_container">
          <div class="deshbord_container_items3">
            <div class="deshbord_container_items_icon"><i class="fa-solid fa-comment-sms icon"></i></div>
              <div class="deshbord_container_items_data"><h2>2924</h2></div>
          </div>
        </div>

        <div class="deshbord_container">
          <div class="deshbord_container_items4">
              <div class="deshbord_container_items_icon"><i class="fa-solid fa-envelope icon"></i></div>
              <div class="deshbord_container_items_data"><h2><?php echo $total_email; ?></h2></div>
          </div>
        </div>
    </div>
    <div class="charts">
      <div class="graphBox">
        <div class="box">
          <canvas id="myChart" ></canvas>
        </div>
        <div class="box">
          <div id="donutchart" width="700" height="250"></div> 
        </div>
      </div>
    </div>

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



var xValues = ["WhatsApp", "SMS", "Email"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["#f09ccd", "#7884cc","#71c78b"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
// ****************************************
         anychart.onDocumentReady(function () {  
        // add the data
        var data = anychart.data.set([
          ["WhatsApp", 20],
          ["Email", 20],
          ["SMS", 30],
          ["French Open", 30]
        ]);
        // create a pie chart instance with the passed data
        var chart = anychart
          .pie(data)
          // set the inner radius to make a donut chart
          .innerRadius("55%");
        // set the chart title
        //chart.title("Grand Slam Titles Won by Roger Federer");
        // set the container id for the chart
        chart.container("donutchart");
        // draw the resulting chart
        chart.draw();
      });

  // ****************************************
 </script>	
</body>
</html>