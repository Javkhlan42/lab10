function getDataByID() {
    var searchID = document.getElementById("searchID").value;
    var params = "ID=" + encodeURIComponent(searchID);
    var url = "get_data_by_id.php";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var result = JSON.parse(xhr.responseText);
                displayResult(result);
            } else {
                alert('Error: ' + xhr.status);
            }
        }
    };

    xhr.send(params);
}

function displayResult(data) {
    var resultDiv = document.getElementById("result");
    if (data !== "0 results") {
        resultDiv.innerHTML = "<p>ID: " + data.ID + "</p>" +
                              "<p>Name: " + data.Name + "</p>" +
                              "<p>Description: " + data.Description + "</p>";
    } else {
        resultDiv.innerHTML = "No results found";
    }
}
