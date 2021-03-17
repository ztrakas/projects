let calendar = document.querySelector('.calendar');
let date = new Date();
let cyear = date.getFullYear();
let cmonth = date.getMonth();
let cday = date.getDate();
let tableBody = calendar.querySelector('tbody');
let firstChecked = null;
let lastChecked = null;
let calendarIsSet = false;
document.getElementById('start-date').placeholder = cyear + '/' + (cmonth + 1) + '/' + cday;
let message = calendar.querySelector('.message');

document.getElementById('end-date').value = lastChecked;
let months = ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"];

function monthDays(year, month) {
    return new Date(year, month, 0).getDate();
}

// document.addEventListener('load', drawCalendar(cyear, cmonth));

//
//Making Calendar
//

function drawCalendar(year, month) {
    tableBody.innerHTML = "";
    let firstDay = (new Date(year, month)).getDay() - 1;
    let firstDayForCheck = firstDay;
    calendar.querySelector('.er').textContent = year + ' ' + months[month];
    if (firstChecked === null) {
        message.innerHTML = "Pasirinkite atvykimo data";
    } else if (lastChecked === null) {
        message.innerHTML = "Pasirinkite isvykimo data";
    } else {
        message.innerHTML = "";
    }


    let d = 1;
    let dd = 1;
    for (let i = 0; i < 6; i++) {



        let tableRow = document.createElement('tr');

        for (let j = 0; j < 7; j++) {

            if (i === 0 && j < firstDay) {
                let last = (monthDays(year, month) - firstDayForCheck) + 1;

                let cell = document.createElement("td");
                cell.innerHTML = last;
                cell.classList.add('befor-this');
                cell.style.opacity = 0.5;
                tableRow.appendChild(cell);
                firstDayForCheck--;
            } else if (d > monthDays(year, month + 1)) {
                let cell = document.createElement("td");
                cell.innerHTML = dd;
                cell.classList.add('after-this');
                cell.style.opacity = 0.5;
                tableRow.appendChild(cell);
                dd++;
            } else {

                let cell = document.createElement("td");
                cell.classList.add('this');
                cell.innerHTML = d;
                if (cmonth === date.getMonth() && d === cday) {
                    cell.classList.add('current');
                }


                tableRow.appendChild(cell);
                d++;
            }
        }

        tableBody.appendChild(tableRow);
    }
    selectDays();
}





//Selecting days
function selectDays() {
    let calendarData = calendar.querySelectorAll('td');

    for (let data of calendarData) {
        let dataDay = data.innerHTML;
        data.addEventListener('click', () => {

            let checkif = data.classList.contains('after-this');

            if (data.classList.contains('this')) {

                if ((cmonth === date.getMonth() && dataDay >= date.getDay()) || cmonth > date.getMonth()) {
                    // if (firstChecked === null || lastChecked === null) {

                    if (firstChecked === null) {
                        firstChecked = cyear + '/' + (cmonth + 1) + '/' + dataDay;
                        message.innerHTML = "Pasirinkite isvykimo data";
                        document.getElementById('start-date').value = firstChecked;
                    } else if (lastChecked === null) {

                        if (parseInt(firstChecked.split('/')[1]) < (cmonth + 1)) {
                            lastChecked = cyear + '/' + (cmonth + 1) + '/' + dataDay;
                            document.getElementById('end-date').value = lastChecked;
                            message.innerHTML = "Tikrinkite";
                        }

                        if (parseInt(firstChecked.split('/')[1]) === (cmonth + 1)) {
                            if (parseInt(firstChecked.split('/')[2]) < dataDay) {
                                lastChecked = cyear + '/' + (cmonth + 1) + '/' + dataDay;
                                document.getElementById('end-date').value = lastChecked;
                                message.innerHTML = "Tikrinkite";
                            }
                        }

                        if (parseInt(firstChecked.split('/')[1]) > (cmonth + 1)) {
                            firstChecked = null;
                            lastChecked = null;

                            document.getElementById('start-date').value = firstChecked;
                            message.innerHTML = "Pasirinkite isvykimo data";
                            document.getElementById('end-date').value = lastChecked;
                        }

                    } else {
                        firstChecked = null;
                        lastChecked = null;

                        document.getElementById('start-date').value = firstChecked;
                        message.innerHTML = "Pasirinkite isvykimo data";
                        document.getElementById('end-date').value = lastChecked;
                    }

                } else {
                    firstChecked = null;
                    lastChecked = null;

                    document.getElementById('start-date').value = firstChecked;
                    message.innerHTML = "Pasirinkite isvykimo data";
                    document.getElementById('end-date').value = lastChecked;
                }
            }
            markDays();
        });
    }
    markDays();
}








//Function to mark selected days

function markDays() {
    let checkedFrom, checkedTo, year, yearTo, month, monthTo, day, dayTo, cc = null;
    let thisMonth = calendar.querySelectorAll('.this');
    if (firstChecked != null) {
        checkedFrom = firstChecked.split('/');
        year = checkedFrom[0];
        month = parseInt(checkedFrom[1]);
        day = parseInt(checkedFrom[2]);

        for (let ise of thisMonth) {
            cc = parseInt(ise.innerHTML);
            if ((cmonth + 1) === month && cc === day) {

                ise.classList.add('checked');
            }
        }
    }
    if (lastChecked != null) {
        console.log('asd');
        checkedTo = lastChecked.split('/');
        yearTo = checkedTo[0];
        monthTo = parseInt(checkedTo[1]);
        dayTo = parseInt(checkedTo[2]);

        for (let ise of thisMonth) {
            cc = parseInt(ise.innerHTML);
            if ((cmonth + 1) >= month && (cmonth + 1) <= monthTo) {

                if (month === monthTo) {
                    if (day < cc && cc <= dayTo) {

                        ise.classList.add('checked');
                    }

                }
                if ((cmonth + 1) === month && month < monthTo) {
                    if (day < cc) {

                        ise.classList.add('checked');
                    }
                }
                if ((cmonth + 1) === monthTo && month < monthTo) {
                    if (dayTo >= cc) {

                        ise.classList.add('checked');
                    }
                }
                if ((cmonth + 1) < monthTo && cmonth > month) {


                    ise.classList.add('checked');

                }

            }

        }
    }

    if (lastChecked === null && firstChecked === null) {

        for (let ise of thisMonth) {



            ise.classList.remove('checked');

        }
    }
}

//Calendar Navigation

let next = calendar.querySelector('.forward');
next.addEventListener('click', () => {
    // cyear = (cmonth === 11) ? cyear + 1 : cyear;
    cmonth = (cmonth + 1) % 12;
    drawCalendar(cyear, cmonth);
});
let back = calendar.querySelector('.back');
back.addEventListener('click', () => {
    // cyear = (cmonth === 0) ? cyear - 1 : cyear;
    cmonth = (cmonth === 0) ? 11 : cmonth - 1;
    drawCalendar(cyear, cmonth);
});

let triggers = document.querySelector('.booking-form').querySelectorAll('input');

for (let trigger of triggers) {
    trigger.addEventListener('click', () => {

        if (!calendarIsSet) {
            calendar.classList.toggle('displaynone');
            drawCalendar(cyear, cmonth);
            calendarIsSet = true;
        } else {
            calendar.classList.toggle('displaynone');
            calendarIsSet = false;
        }

    });
}