<?php
    function showRadio(){
        $radioVal = $("input[name='1']:checked").val();
        if(radioVal) {
            $( "#radioMsg" ).html("<p>"+radioVal+"</p>");
        }
    }
?>