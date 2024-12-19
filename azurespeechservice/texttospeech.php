<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $text = $_POST['input'];
    $timestamp = gmdate("Y-m-d\TH:i:s\Z");
    $url = "https://eastus.tts.speech.microsoft.com/cognitiveservices/v1";
    $subscription_key = "e8413e6a1ad84a46b6eeb4bb3d01a843";
    $output_format = "audio-16khz-128kbitrate-mono-mp3";
    $data = "<speak version='1.0' xml:lang='en-US'><voice xml:lang='en-US' xml:gender='Female' name='en-US-JennyNeural'>$text</voice></speak>";
    $command = "curl --location --request POST \"$url\" --header \"Ocp-Apim-Subscription-Key: $subscription_key\" --header \"Content-Type: application/ssml+xml\" --header \"X-Microsoft-OutputFormat: $output_format\" --header \"User-Agent: curl\" --data-raw \"$data\" --output \"$timestamp\"-output.mp3";
    $response = exec($command);
    
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <title>Text to Speech</title>
    <link href="assets/img/LoopTech_MockupLogo_Black_15MAY2023.ico" rel="icon">
  <link href="assets/img/LoopTech_MockupLogo_Black_15MAY2023.ico" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
you can use Azure AI Speech to converse with Azure OpenAI Service. The text recognized by the Speech service is sent to Azure OpenAI. The text response from Azure OpenAI is then synthesized by the Speech service.
    <form method="post">
        
        <label for="input">Enter text:</label>
        <input type="text" name="input" id="input" size="300">
        <button type="submit">Submit</button> 
    </form>
    <?php
         echo "<audio controls autoplay><source src='$timestamp-output.mp3' type='audio/mpeg'></audio>";
    ?>

</body>
</html>
