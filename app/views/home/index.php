<div class="content">
    <h2 style="margin-top: 70px;">Dashboard</h2>
    <div id="clock" style="text-align:right;font-size:30px;font-weight: bold;"></div> <!-- Ensure this element exists -->

    <div class="grid-container">
            <div class="card">
                <div class="i">
                    <i class="fa fa-swatchbook" style="background-color: #F6771B;"></i> 
                </div>
                <div class="ii">
                    <h3>Mata Kuliah</h3>
                    <p>25</p>
                </div> 
            </div>

            <div class="card">
            <div class="i">
                <i class="fa fa-chalkboard-user" style="background-color: #CC1111;"></i>
                </div>
                <div class="ii">
                <h3>Dosen</h3>
                <p>10</p>
                </div>
                
            </div>
            <div class="card">
            <div class="i">
            <i class="fa-brands fa-teamspeak" style="background-color: #51A8B1;"></i>
                </div>
                <div class="ii">
                <h3>Asisten</h3>
                <p>15</p>
                </div>
               
            </div>
            <div class="card">
            <div class="i">
            <i class="fa fa-podcast" style="background-color: #430D6D;"></i>
                </div>
                <div class="ii">
                <h3>Frekuensi</h3>
                <p>Weekly</p>
                </div>
                
            </div>
            <div class="card">
            <div class="i">
            <i class="fa fa-book-open-reader" style="background-color: #30851B;"></i>
                </div>
                <div class="ii">
                <h3>Praktikan</h3>
                <p>100</p>
                </div>
                
            </div>
        </div>
    
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
