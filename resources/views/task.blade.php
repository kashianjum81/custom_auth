<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My task</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            position: relative;
        }

        .ring {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            border: 1px solid black;
            cursor: pointer;
        }

        .ring-1 {
            width: 450px;
            height: 450px;
        }

        .ring-2 {
            width: 400px;
            height: 400px;
        }

        .ring-3 {
            width: 350px;
            height: 350px;
        }

        .ring-4 {
            width: 300px;
            height: 300px;
        }

        .ring-5 {
            width: 250px;
            height: 250px;
        }

        .point {
            position: absolute;
            font-size: 12px;
        }

        .active {
            background-color: blue;
        }

        #summary {
            margin-top: 20px;
        }

        #ring-summary {
            list-style: none;
            padding: 0;
        }

        #ring-summary li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div id="container">
        <div class="ring ring-1" data-points="1">
            <span style="margin-left: 80px">5</span>
            <span class="point"></span>
        </div>
        <div class="ring ring-2" data-points="2">
            <span style="margin-left: 270px">4</span>
        </div>
        <div class="ring ring-3" data-points="3">
            <span style="margin-left: 330px">3</span>
        </div>
        <div class="ring ring-4" data-points="4">
            <span style="margin-left: 380px">2</span>
        </div>
        <div class="ring ring-5" data-points="5">
            <span style="margin-left: 430px">1</span>
        </div>
    </div>
    <div id="summary">
        <h3>Total Points: <span id="total-points">0</span></h3>
        <ul id="ring-summary"></ul>
    </div>
    <script>
        $(document).ready(function () {
            $(".ring").each(function (index) {
                const points = index + 1;
                const pointText = $("<span class='point'>" + points + "</span>");
                $(this).append(pointText);

                $(this).on("click", function () {
                    $("#total-points").text(parseInt($("#total-points").text()) + points);
                    const ringName = "Ring " + (index + 1);
                    const listItem = $("<li>" + ringName + ": " + points + " points</li>");
                    $("#ring-summary").append(listItem);
                    $(this).addClass("active");
                    setTimeout(() => $(this).removeClass("active"), 500);
                });
            });
        });
    </script>
</body>

</html>