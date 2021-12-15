<?php
if (isset($_POST['submit'])) {
  $sender = $_POST['sender_id'];
  $to = $_POST['recipients'];
  $message = $_POST['message'];
  $type = $_POST['message_type'];
  $routing = $_POST['dnd_management'];
  $message_type = $_POST['message_type'];
  $schedule = $_POST['schedule'];

  $params = array(
    'token' => 'Ls3p7ySpccZWGMR2oHCY8GzNcAYrLJxpQ2fT7BCJxzQaR2Iptd878UYrMeTAW3fNpPjtyiYthD5gIsEpEDDttdcKdP2uUEcdiQeO',
    'sender' => $sender,
    'to' => $to,
    'message' =>$message,
    'type' => $message_type,
    'routing' => $routing,
    'schedule' => $schedule,
  );

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.smartsmssolutions.ng/io/api/client/v1/sms/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $params,
  ));
  $response = curl_exec($curl);


  curl_close($curl);

  die(var_dump($response));

}

$response = null;

if (!$response && isset($_POST['submit'])) {
  ?>
  <script>alert('message sent!')</script>
  <?php
}
elseif ($response && isset($_POST['submit'])){
  echo $response;
?>
<script>alert('message not sent!')</script>
<?php
}
?>


<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2 class="text-center">Message Scheduler App</h2>

<div class="container">
  <form method="post">
    <div class="row">
      <div class="col-25">
        <label for="sender_id">Sender ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="sender_id" name="sender_id" placeholder="Enter Sender ID Here...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="recipients">Recipients</label>
      </div>
      <div class="col-75">
        <input type="number" id="recipients" name="recipients" placeholder="Type In Recipients Here...">
      </div>
    </div>
  
    <div class="row">
      <div class="col-25">
        <label for="message">Message</label>
      </div>
      <div class="col-75">
        <textarea id="message" name="message" placeholder="Write Message Here..." style="height:200px"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="message_type" >Message Type</label>
      </div>
      <div class="col-75">
        <select id="message_type" name="message_type">
        <option value="">choose an option</option>
          <option value="0">Plain Text Message</option>
          <option value="1">Flash Message</option>
        </select>
      </div>
    </div> <br>

    <div class="row">
      <div class="col-25">
        <label for="dnd_management">DND Management</label>
      </div>
      <div class="col-75">
        <select id="dnd_management" name="dnd_management">
        <option value="">Choose an option</option>
          <option value="2">Send to Non-DND Only</option>
          <option value="3">Bulk Corporate Route for Phone Numbers on DND</option>
          <option value="6">Use International Route for phone numbers on DND</option>
          <option value="8">Use International Route for all phone numbers</option>
        </select>
      </div>
    </div> <br>

    <div class="row">
    <div class="col-25">
      <label for="schedule">Schedule Message: </label>
    </div>
    <div class="col-75">
    <input type="datetime-local" id="schedule" name="schedule">
    </div>

    <div class="row">
      <input type="submit" value="Submit" name="submit">
    </div>
  </form>
</div>

<div>&copy; 2010-<?php echo date("Y");?></div>

</body>
</html>
