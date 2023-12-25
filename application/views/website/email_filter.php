<!--     
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Filters</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #filter-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .item {
            margin-bottom: 8px;
        }
        .email{
            overflow: auto;
/*            background-color: lightblue;*/
            height:200px;
            width: 300px;
        }
    </style>
</head>
<body>

<div id="filter-container">
    <form action="<?= base_url('USER/FILTER/ajax'); ?>" method="post">
    <label>
        <select id="select-tag-filter" name="Catagary">
            <option>All</option>

          <?php $i = 0; foreach($catagary as $all): ?>

            <option><?php echo $all['catagary'] ?></option>
            
        <?php $i++; endforeach; ?>
        </select>
    </label>


    <label>
        <select id="campaign-filter" name="Campaing">
            <?php $i = 0; foreach($create_campaing as $all): ?>

            <option><?php echo $all['title'] ?></option>
        <?php $i++; endforeach; ?>
        </select>
    </label>

    <label>
        <select id="delivery-filter" name="Delivered">
            <option>Delivered/Not Delivered</option>
            <option>Delivered</option>
            <option>Not Delivered</option>
        </select>
    </label>

    <label>
        <select id="seen-filter" name="Seen">
            <option value="Seen_Unseen">Seen/Unseen</option>
            <option value="seen">Seen</option>
            <option value="unseen">Unseen</option>
        </select>
    </label>

    <label>
        <select id="send-filter" name="Sent">
            <option value="Sent_Unsent">Sent/Unsent</option>
            <option value="sent">Sent</option>
            <option value="unsent">Unsent</option>
        </select>
    </label>
    <label>
        <select id="send-filter" name="Sent_times">
            <option>NO</option>
            <option>One</option>
            <option>Two</option>
            <option>Many</option>
        </select>
    </label>
    <label>
        <button type="submit">search</button>
    </label>
    </form>
    <?php $compaint_id = $_SESSION['compaint_id'] ?>
    
    <form action="<?= base_url('USER/PROJECTMAIL/index/'.$compaint_id); ?>" method="post">

    <div id="item-container" class="email">
        <?php

        $email = array();  

        $i = 0; foreach($results as $all){ ?>
           <div data-category="<?php echo $all['catagary']?>"><?php $email[$i] =  $all['email'];
                echo $all['email'];
            array_push($email,$email[$i]);

            $this->session->set_userdata('multiple_emails', $email);
           ?></div>
        <?php $i++; }
            
        ?>
        <?php

         

        $j = 0; foreach($reports as $rep){ ?>

           <div data-category="<?php echo $all['catagary']?><?php echo $all['camaping']?>"><?php $email[$i] =  $all['email'];
                echo $rep['email'];
            array_push($email,$email[$i]);

            $this->session->set_userdata('multiple_emails', $email);
           ?></div>

        <?php $j++; } 
            
        ?>
       
        
        
    </div>
    <button type="submit">save</button><span><?php echo $i+$j; ?></span>

     </form>   

</div>

<script>
    var selectTagFilter = document.getElementById('select-tag-filter');
    var dateFilter = document.getElementById('date-filter');
    var campaignFilter = document.getElementById('campaign-filter');
    var deliveryFilter = document.getElementById('delivery-filter');
    var seenFilter = document.getElementById('seen-filter');
    var sendFilter = document.getElementById('send-filter');

    var items = document.querySelectorAll('.item');

    function applyFilters() {
        var selectedFilters = {
            'select-tag': selectTagFilter.value,
            'date': dateFilter.value,
            'campaign': campaignFilter.value,
            'delivered': deliveryFilter.value,
            'seen': seenFilter.value,
            'sent': sendFilter.value
        };

        items.forEach(function(item) {
            var itemFilters = item.className.split(' ').filter(function(className) {
                return className !== 'item';
            });

            var isVisible = Object.keys(selectedFilters).every(function(filter) {
                return selectedFilters[filter] === '' || itemFilters.includes(selectedFilters[filter]);
            });

            item.style.display = isVisible ? 'block' : 'none';
        });
    }

    function applyCategoryFilters(){
        //AJAX CALL 
        //fetch
        fetch("http://localhost/newproject/index.php/USER/FILTER/ajaxs", {
            select: selectTagFilter.value
        })  
    }

    selectTagFilter.addEventListener('change', applyCategoryFilters);
    dateFilter.addEventListener('change', applyFilters);
    campaignFilter.addEventListener('change', applyFilters);
    deliveryFilter.addEventListener('change', applyFilters);
    seenFilter.addEventListener('change', applyFilters);
    sendFilter.addEventListener('change', applyFilters);
</script>
 


 <script type="text/javascript" src="<?php echo base_url('../assets/js/filter.js');?>"></script>
</body>
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filter Elements</title>
  <style>
    .element {
      display: block;
      margin-bottom: 10px;
    }
    .hidden {
      display: none;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #filter-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }
    .email{
            overflow: auto;
/*            background-color: lightblue;*/
            height:200px;
            width: 300px;
        }
        .hide {
  display: none;
}
  </style>
</head>
<body>
<div id="filter-container">
  <label for="categorySelect">Category:</label>
  <select id="categorySelect">
    <option value="">All</option>
    <?php $i = 0; foreach($catagary as $all): ?>

            <option value="<?php echo $all['catagary'] ?>"><?php echo $all['catagary'] ?></option>
            
        <?php $i++; endforeach; ?>
    <!-- Add more categories as needed -->
  </select>

  <label for="campaignSelect">Campaign:</label>
  <select id="campaignSelect">
    <option value="">All</option>
    
            <?php $i = 0; foreach($create_campaing as $all): ?>

            <option value="<?php echo $all['title'] ?>"><?php echo $all['title'] ?></option>
            <?php $i++; endforeach; ?>
        </select>
    <!-- Add more campaigns as needed -->
  </select>

  <label for="deliverySelect">Delivery Status:</label>
  <select id="deliverySelect">
    <option value="">All</option>
    <option value="1">Delivered</option>
    <option value="0">Not Delivered</option>
  </select>

  <label for="statusSelect">Message Status:</label>
  <select id="statusSelect">
    <option value="">All</option>
    <option value="1">Seen</option>
    <option value="0">Unseen</option>
  </select>

  <label for="sendStatusSelect">Send Status:</label>
  <select id="sendStatusSelect">
    <option value="">All</option>
    <option value="1">Send</option>
    <option value="0">Unsend</option>
  </select>

  <label for="sendFrequencySelect">Send Frequency:</label>
  <select id="sendFrequencySelect">
    <option value="">All</option>
    <option value="1">One Time</option>
    <option value="2">Two Time</option>
    <option value="3">Many Time</option>
  </select>

  <!-- Sample elements to be filtered -->
  <?php $compaint_id = $_SESSION['compaint_id'] ?>
    
    <form action="<?= base_url('USER/PROJECTMAIL/index/'.$compaint_id); ?>" method="post">

    <div id="item-container" class="email">
  

        <?php

        $email = array();  

        $i = 0; foreach($results as $all){ ?>
           <div class="element" data-category="<?php echo $all['catagary']?>" data-campaign="" data-delivery="delivered" data-status="seen" data-send-status="send" data-send-frequency="one-time">
            <?php 
                $email[$i] =  $all['email'];
                echo $all['email'];
                array_push($email,$email[$i]);
                $this->session->set_userdata('multiple_emails', $email);
           ?></div>
        <?php $i++; }
            
        ?>


  

            <?php

         

        $j = 0; foreach($reports as $rep){ ?>

           <div class="element" data-category="<?php echo $rep['catagary']; ?>" data-campaign="<?php echo $rep['camaping']?>" data-delivery="<?php echo $rep['delivered']; ?>" data-status="<?php echo $rep['seen']; ?>" data-send-status="<?php echo $rep['sending_date']; ?>" data-send-frequency="<?php echo $rep['sending_time']; ?>" no-data = "no-data" class="demo" >
            <?php 
                $email[$i] =  $all['email'];
                echo $rep['email'];
                array_push($email,$email[$i]);

                $this->session->set_userdata('multiple_emails', $email);
           ?>
             <p id="myP" style="display: none;">I am a pasdfasdfsph.</p>  
           </div>
            
        <?php $j++; } 
            
        ?>
        </div>
        <button type="submit">save</button><span><?php echo $i+$j; ?></span>
    
</form>
</div>

  <!-- Add more elements as needed -->

  <script>
    function filterElements() {
      var category = document.getElementById('categorySelect').value;
      var campaign = document.getElementById('campaignSelect').value;
      var deliveryStatus = document.getElementById('deliverySelect').value;
      var messageStatus = document.getElementById('statusSelect').value;
      var sendStatus = document.getElementById('sendStatusSelect').value;
      var sendFrequency = document.getElementById('sendFrequencySelect').value;
      // let html = document.getElementById("myP").innerHTML;

     

      var elements = document.querySelectorAll('.element');
      var x = document.getElementById("myDIV");

      elements.forEach(function(element) {
        var showElement =
          (category === '' || element.dataset.category === category) &&
          (campaign === '' || element.dataset.campaign === campaign) &&
          (deliveryStatus === '' || element.dataset.delivery === deliveryStatus) &&
          (messageStatus === '' || element.dataset.status === messageStatus) &&
          (sendStatus === '' || element.dataset.sendStatus === sendStatus) &&
          (sendFrequency === '' || element.dataset.sendFrequency === sendFrequency);

        // Show or hide the element based on the filter criteria
        if (showElement) {

          element.classList.remove('hidden');

        } else {
            
          element.classList.add('hidden');
        }
            // document.write(showElement);
        if (showElement === false) {
            document.getElementById("myP").style.display = "block";
        }

      }


      );
      // document.write('no data found');
    }

    // Attach the filterElements function to the change event of each select tag
    document.getElementById('categorySelect').addEventListener('change', filterElements);
    document.getElementById('campaignSelect').addEventListener('change', filterElements);
    document.getElementById('deliverySelect').addEventListener('change', filterElements);
    document.getElementById('statusSelect').addEventListener('change', filterElements);
    document.getElementById('sendStatusSelect').addEventListener('change', filterElements);
    document.getElementById('sendFrequencySelect').addEventListener('change', filterElements);
   

    // Initial filtering on page load
    filterElements();
  </script>

</body>
</html>
