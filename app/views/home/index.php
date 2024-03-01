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
                <p><?= $data['jml_matkul']; ?></p>
            </div>
        </div>
        <div class="card">
            <div class="i">
                <i class="fa fa-chalkboard-user" style="background-color: #CC1111;"></i>
            </div>
            <div class="ii">
                <h3>Dosen</h3>
                <p><?= $data['jml_dosen'] ?></p>
            </div>
        </div>
        <div class="card">
            <div class="i">
                <i class="fa-brands fa-teamspeak" style="background-color: #51A8B1;"></i>
            </div>
            <div class="ii">
                <h3>Asisten</h3>
                <p><?= $data['jml_asisten'] ?></p>
            </div>
        </div>
        <div class="card">
            <div class="i">
                <i class="fa fa-podcast" style="background-color: #430D6D;"></i>
            </div>
            <div class="ii">
                <h3>Frekuensi</h3>
                <p><?= $data['jml_frek'] ?></p>
            </div>

        </div>
        <div class="card">
            <div class="i">
                <i class="fa fa-book-open-reader" style="background-color: #30851B;"></i>
            </div>
            <div class="ii">
                <h3>Praktikan</h3>
                <p><?= $data['jml_praktikan'] ?></p>
            </div>

        </div>
    </div>

    <div class="line">

    </div>
    <div class="containers" style="display: flex;gap:10px">
        <div class="container1" style="width:50%;border:1px solid #ccc;border-radius:5px;padding:10px;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM Asisten</th>
                        <th>Nama Asisten</th>
                        <!-- <th>Kelas</th>
                <th>Prodi</th>                -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data['asisten'] as $asisten) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $asisten['nim_asisten']; ?></td>
                            <td><?= $asisten['nama_asisten']; ?></td>
                            <!-- <td><?= $asisten['kelas']; ?></td>
            <td><?= $asisten['prodi']; ?></td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- KALENDER -->
        <div class="calendar">
            <div class="calendar-header">
                <i class="left fas fa-caret-left" onclick="previous()" style="font-size: 25px;"></i>
                <div id="monthAndYear"></div>
                <i class="right fa fa-caret-right" onclick="next()" style="font-size: 25px;"></i>
                <!-- <i class="right fas fa-chevron-right" onclick="next()"></i> -->
            </div>
            <div class="form-inline">


                <label class="lead" for="month">Melompat Ke : </label>
                <select class="form-control" name="month" id="month" onchange="jump()">
                    <option value=0>Jan</option>
                    <option value=1>Feb</option>
                    <option value=2>Mar</option>
                    <option value=3>Apr</option>
                    <option value=4>May</option>
                    <option value=5>Jun</option>
                    <option value=6>Jul</option>
                    <option value=7>Aug</option>
                    <option value=8>Sep</option>
                    <option value=9>Oct</option>
                    <option value=10>Nov</option>
                    <option value=11>Dec</option>
                </select>

                <label for="year"></label>
                <select class="form-control" name="year" id="year" onchange="jump()">
                    <option value=1990>1990</option>
                    <!-- Add options for years here -->
                </select>
            </div>
            <table>

                <thead>
                    <tr>
                        <th>Minggu</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
            </table>
            <table class="calendar-table" id="calendar-body">



                <tbody id="calendar-dates">

                </tbody>

            </table>
            <div class="todays" style="text-align:center;margin-top:5px;">

                <button class="btn" onclick="today()" style="background-color:#ffff;color:black;">Today</button>
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

<script>
    let currentMonth;
    let currentYear;
    let selectYear = document.getElementById("year");
    let selectMonth = document.getElementById("month");

    let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    let monthAndYear = document.getElementById("monthAndYear");
    let calendarBody = document.getElementById("calendar-body");

    showCalendar(new Date().getMonth(), new Date().getFullYear());

    function next() {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
    }

    function previous() {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear);
    }

    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value);
        showCalendar(currentMonth, currentYear);
    }

    function today() {
        let today = new Date(); // Update today's date
        currentMonth = today.getMonth();
        currentYear = today.getFullYear();
        showCalendar(currentMonth, currentYear);
    }

    function showCalendar(month, year) {
        currentMonth = month;
        currentYear = year;

        let firstDay = (new Date(year, month)).getDay();
        let daysInMonth = 32 - new Date(year, month, 32).getDate();

        monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;

        calendarBody.innerHTML = "";

        let date = 1;
        for (let i = 0; i < 6; i++) {
            let row = document.createElement("tr");
            for (let j = 0; j < 7; j++) {
                let cell = document.createElement("td");
                if (i === 0 && j < firstDay) {
                    cell.appendChild(document.createTextNode(""));
                } else if (date > daysInMonth) {
                    break;
                } else {
                    cell.appendChild(document.createTextNode(date));
                    if (date === new Date().getDate() && year === new Date().getFullYear() && month === new Date().getMonth()) {
                        cell.classList.add("highlight-today");
                    }
                    date++;
                }
                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }


    }

    // Populate years in select element
    let yearOptions = document.getElementById("year");
    for (let i = 1990; i <= new Date().getFullYear() + 10; i++) {
        let option = document.createElement("option");
        option.value = i;
        option.text = i;
        yearOptions.appendChild(option);
    }
</script>