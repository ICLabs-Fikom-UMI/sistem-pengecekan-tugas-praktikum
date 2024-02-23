<div class="content">
    <h2 style="margin-top: 70px;">Dashboard</h2>
    <div id="clock" style="text-align:right;font-size:30px;font-weight: bold;"></div> <!-- Ensure this element exists -->
</div>

<!-- JavaScript for clock -->
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Format time to always have two digits (e.g., 01, 02, 03)
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var timeString = hours + ':' + minutes + ':' + seconds;

        // Update the element with ID "clock" with the new time
        document.getElementById('clock').textContent = timeString;
    }

    // Call updateClock function every second
    setInterval(updateClock, 1000);

    // Call updateClock() to display the clock immediately when the page is loaded
    updateClock();
</script>
