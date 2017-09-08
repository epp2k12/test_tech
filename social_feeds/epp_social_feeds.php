<!DOCTYPE html>
<html>
<body>

<h2>Get data as JSON from a PHP file on the server.</h2>

<p id="demo"></p>

<script>

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        document.getElementById("demo").innerHTML = myObj[0].text;
    }
};
alert("hello world!");
xmlhttp.open("GET", "http://localhost/tweetsJSON/tweets_json.php", true);
xmlhttp.send();

</script>

</body>
</html>