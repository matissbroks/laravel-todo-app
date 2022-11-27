
window.onload = function WindowLoad(event) {
    let allDoneBtn = document.querySelectorAll('button[id^="done"]');
    let allDeleteBtn = document.querySelectorAll('button[id^="delete"]');

    allDoneBtn.forEach(item => {
        item.addEventListener('click', event => {
            let deleteUrl = document.getElementById('doneURL'+item.value);

            doRequest(deleteUrl.value);
        })
    })

    allDeleteBtn.forEach(item => {
        item.addEventListener('click', event => {
            let deleteUrl = document.getElementById('deleteURL'+item.value);

            doRequest(deleteUrl.value);
        })
    })

    function doRequest(requestURL) {
        // Creating the XMLHttpRequest object
        let request = new XMLHttpRequest();

        // Instantiating the request object
        request.open("GET", requestURL);

        // Defining event listener for readystatechange event
        request.onreadystatechange = function() {
            // Check if the request is compete and was successful
            if(this.readyState === 4 && this.status === 200) {
                let parsedResult = JSON.parse(this.response);

                console.log(parsedResult);
            }
        };

        // Sending the request to the server
        request.send();
    }
}


