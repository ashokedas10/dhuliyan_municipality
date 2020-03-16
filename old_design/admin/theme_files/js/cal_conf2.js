
//Define calendar(s): addCalendar ("Unique Calendar Name", "Window title", "Form element's name", Form name")
addCalendar("calender1", "Select Date", "DOJ", "clientreg");
addCalendar("calender2", "Select Date", "DOJ", "clientreg");
addCalendar("calender3", "Select Date", "closingdate", "growt_closing");
addCalendar("calender31", "Select Date", "closingdate", "special_rewards");
addCalendar("dis1", "Select Date", "fromdt", "DIS");
addCalendar("dis2", "Select Date", "todt", "DIS");
addCalendar("CALRCPT", "Select Date", "paydate", "FRMBILLRCPT");
addCalendar("calchqdate", "Select Date", "chqdate", "FRMBILLRCPT");


addCalendar("startingdate", "Select Date", "startingdate", "frmreport");
addCalendar("closingdate", "Select Date", "closingdate", "frmreport");
addCalendar("calender41", "Select Date", "bkgdatetime", "frm");
addCalendar("DOJ", "Select Date", "DOJ", "frm");




addCalendar("paydate", "Select Date", "paydate", "frm");
addCalendar("chqdate", "Select Date", "chqdate", "frm");

addCalendar("transaction_date", "Select Date", "transaction_date", "frm");




//frm

// default settings for English
// Uncomment desired lines and modify its values
// setFont("verdana", 9);
 setWidth(90, 1, 15, 1);
// setColor("#cccccc", "#cccccc", "#ffffff", "#ffffff", "#333333", "#cccccc", "#333333");
// setFontColor("#333333", "#333333", "#333333", "#ffffff", "#333333");
setFormat("yyyy-mm-dd");
// setSize(200, 200, -200, 16);

// setWeekDay(0);
 //setMonthNames("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
// setDayNames("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
// setLinkNames("[Close]", "[Clear]");
