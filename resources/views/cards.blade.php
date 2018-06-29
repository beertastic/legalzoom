<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1>Let's play!!</h1>

Here are 52 cards. Choose Higher of lower correctly, to stay in the game.
<br /> Guess wrong.. and you are out. Good luck!!


<hr />
<div id="show_cards">

    <div class="my_cards" >
        <div class="card">{{ $card['suit'] }} - {{ $card['value'] }}</div>
        <div class="higher" data-value="{{ $card['value'] }}" data-card="1">+++</div>
        <div class="lower" data-value="{{ $card['value'] }}" data-card="1">---</div>
    </div>

</div>

<hr />


<div class="next"> NEXT !!</div>

<script>

    $(document).ready(function(){

        $('body').on('click', '.higher', function() {
            var count = $(this).data("card") + 1;
            $.get( "nextcard/" + $(this).data("card"), function( data ) {
                var cd = JSON.parse( data );
                if (cd.value < $(this).data('value')) {
                    // FAILED.. generate error or restar game etc
                    console.log('failed!');
                } else {

                    $("#show_cards").append("    <div class=\"my_cards\" >\n" +
                        "        <div class=\"card\">" + cd.suit + " - " + cd.value + "</div>\n" +
                        "        <div class=\"higher\" data-number=\"" + cd.value + "\" data-card=\"" + count + "\">+++</div>\n" +
                        "        <div class=\"lower\" data-number=\"" + cd.value + "\" data-card=\"" + count + "\">---</div>\n" +
                        "    </div>");
                }
            });
        });

        $('body').on('click', '.lower', function() {
            var count = $(this).data("card") + 1;
            $.get( "nextcard/" + $(this).data("card"), function( data ) {
                var cd = JSON.parse( data );
                if (cd.value > $(this).data('value')) {
                    // FAILED.. generate error or restar game etc
                    console.log('failed!');
                } else {

                    $("#show_cards").append("    <div class=\"my_cards\" >\n" +
                        "        <div class=\"card\">" + cd.suit + " - " + cd.value + "</div>\n" +
                        "        <div class=\"higher\" data-number=\"" + cd.value + "\" data-card=\"" + count + "\">+++</div>\n" +
                        "        <div class=\"lower\" data-number=\"" + cd.value + "\" data-card=\"" + count + "\">---</div>\n" +
                        "    </div>");
                }
            });
        });

    });

</script>

</body>
</html>
