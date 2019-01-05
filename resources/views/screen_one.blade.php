<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 4.2 https://getbootstrap.com/docs/4.2/getting-started/introduction/ -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <title>Cool and fun page</title>

        <style>
            #coolform{
                width:100%;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <form method="POST" action="/screen_one">
                @csrf
                <div class="form-group row">
                    <button type="submit" class="col-sm-2 btn btn-primary">Submit</button>
                    <button type="submit" class="col-sm-2 btn btn-primary" id="ajax_submit">Submit Ajax</button>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="number_submit" id="number_submit" placeholder="0-100"  required pattern="[0-100]" min="1" max="100">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-8" id="ajax_result"></div>
            </div>
        </div>


        <script type="text/javascript">
            function autorun()
            {
                var buttonAction = document.getElementById("ajax_submit");
                buttonAction.addEventListener("click",(e)=>{
                    console.log(e.target.id + "clicked");
                    e.preventDefault();
                    e.stopPropagation();

                    if( document.getElementById("number_submit").checkValidity() ){
                        ajaxSubmit();
                    }

                });

                function ajaxSubmit(){
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState === 4){
                            console.log(this);
                            // write regardless of success
                            document.getElementById("ajax_result").innerHTML = "<h1>" + String(this.responseText) + "</h1>";
                        }
                    }
                    var json = {"number_submit":document.getElementById("number_submit").value};
                    var jsonString = JSON.stringify(json);
                    xhttp.open("POST", "/screen_one", true);
                    xhttp.setRequestHeader("Content-type", "application/json");
                    xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                    xhttp.send( jsonString );

                }

            }
            if (document.addEventListener) document.addEventListener("DOMContentLoaded", autorun, false);
            else if (document.attachEvent) document.attachEvent("onreadystatechange", autorun);
            else window.onload = autorun;
        </script>
        <!-- 4.2 https://getbootstrap.com/docs/4.2/getting-started/introduction/ -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
