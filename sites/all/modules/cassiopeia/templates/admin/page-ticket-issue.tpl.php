<?php
$string = "{
\"ListTicket\": [
{
\"Index\": 0,
\"Airline\": \"string\",
\"TicketNumber\": \"string\",
\"IssueDate\": \"2019-04-10T09:05:28.571Z\",
\"BookingCode\": \"string\",
\"PassengerName\": \"string\",
\"BookingFile\": \"string\",
\"TicketImage\": \"string\",
\"TotalPrice\": 0,
\"Status\": \"string\",P a g e 40 | 57
\"ErrorMessage\": \"string\"
}
],
\"BookingImage\": \"string\",
\"Status\": true,
\"ErrorCode\": \"string\",
\"Message\": \"string\"
}";

global $user;
?>
<div class="page-ticket-issue">
    <?php
    $cassiopeia_ticket_issue = drupal_get_form("cassiopeia_ticket_issue");
    if(!empty($cassiopeia_ticket_issue)){
        $cassiopeia_ticket_issue = drupal_render($cassiopeia_ticket_issue);
        print($cassiopeia_ticket_issue);
    }
    ?>
</div>
