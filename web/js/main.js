function calculate() {
    var min = parseInt(document.getElementById("min").value);
    var max = parseInt(document.getElementById("max").value);
    var min_length = document.getElementById("min").value.length;
    var max_length = document.getElementById("max").value.length;
    if(min != NaN && min > 0 && min < 1000000 && max != NaN && max > 0 && max < 1000000 && min_length == 6 && max_length == 6){
        document.getElementById("error").innerHTML = 'Only numbers. Exactly 6 characters long';
        document.getElementById("error").style.color = "black";
        const request = new XMLHttpRequest();
        const url = "/ajax/result";
        const params = "min=" + document.getElementById("min").value+ "&max=" + document.getElementById("max").value+"&_csrf=123321123321";

        request.open("POST", url, true);
        request.setRequestHeader("Content-type", 'application/x-www-form-urlencoded; charset=UTF-8');
        request.setRequestHeader('Access-Control-Allow-Headers', '*');
        request.setRequestHeader('Access-Control-Allow-Origin', '*');

        request.addEventListener("readystatechange", () => {
            if(request.readyState === 4 && request.status === 200) {
                console.log(request.responseText);
                document.getElementById("result").innerHTML = request.responseText;
            }
        });
        request.send(params);
    }else{
        document.getElementById("result").innerHTML = "---";
        document.getElementById("error").style.color = "red";
        if(min == NaN || max == NaN || min_length != 6 || max_length != 6){
            document.getElementById("error").innerHTML = 'Only numbers. Exactly 6 characters long.';
        }else if(min <= 0 || min >= 999999 || max <= 0 || max >= 999999){
            document.getElementById("error").innerHTML = 'Exactly 6 characters long. Only natural numbers';
        }else{
            document.getElementById("error").innerHTML = 'Some kind of mistake.';
        }
    }
}