<?php


echo "<div>
    Jumlah Ticket Masuk | Waktu (Jam)<br>
    0 s.d. 1     1<br>
    2 s.d. 4     2<br>
    5 s.d. 7     3<br>
    7 s.d. 9     4<br>
    10 s.d. 12     5<br>
    13 s.d. 15     6<br>
    16 s.d. 18     7<br>
    19 s.d. 21     8<br>
    22 s.d. 24     9<br>
    25 s.d. 27     10<br>
    28 s.d. 30     11<br>
    31 s.d. 33     12<br>
    34 s.d. 36     13<br>
    37 s.d. 39     14<br>
    40 s.d. 42     15<br>
    42 s.d. 44     16<br>
    45 s.d. 47     17<br>
    48 s.d. 50     18<br>
    51 s.d. 53     19<br>
    54 s.d. 56     20<br>
    57 s.d. 59     21<br>
    60 s.d. 62     22<br>
    63 s.d. 65     23<br>
    66 s.d. 68     24<br>
    69 s.d. 71     25<br>
    72 s.d. 74     26
</div>
<a id='more' href='#'>Read more</a>";
<script type="application/javascript">
    var h = $('div')[0].scrollHeight;

    $('#more').click(function(e) {
        e.stopPropagation();
        $('div').animate({
            'height': h
        })
    });

    $(document).click(function() {
        $('div').animate({
            'height': '5px'
        })
    })
</script>