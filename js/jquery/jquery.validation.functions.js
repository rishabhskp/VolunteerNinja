/**
 * @author GeekTantra
 * @date 24 September 2009
 */
/*
 * This functions checks where an entered date is valid or not.
 * It also works for leap year feb 29ths.
 * @year: The Year entered in a date
 * @month: The Month entered in a date
 * @day: The Day entered in a date
 */
function isValidDate(year, month, day) {
    var date = new Date(year, (month - 1), day);
    var DateYear = date.getFullYear();
    var DateMonth = date.getMonth();
    var DateDay = date.getDate();
    if (DateYear == year && DateMonth == (month - 1) && DateDay == day)
        return true;
    else
        return false;
}
/*
 * This function checks if there is at-least one element checked in a group of check-boxes or radio buttons.
 * @id: The ID of the check-box or radio-button group
 */
function isChecked(id) {
    var ReturnVal = false;
    $("#" + id).find('input[type="radio"]').each(function () {
        if ($(this).is(":checked"))
            ReturnVal = true;
    });
    $("#" + id).find('input[type="checkbox"]').each(function () {
        if ($(this).is(":checked"))
            ReturnVal = true;
    });
    return ReturnVal;
}

function dateConditions(start, end) {
    if (start != '' && end != '') {
        start = getDateTime(start);
        end = getDateTime(end);
        if (start != false && end != false) {
            if (Date.parse(start) >= Date.parse(end)) {
                return false;
            }
        } else {
            return false;
        }
    }
    return true;
}

function getDateTime(dateTime) {
    var date_time = dateTime.split(" ");
    if (date_time.length == 2) {
        var date = date_time[0].split("-");
        var time = date_time[1].split(":");
        if (date.length == 3 && time.length == 2) {
            return new Date(date[0], date[1], date[2], time[0], time[1]);
        }
        return false;
    }
    return false;
}

function isAgree(id) {
    var ReturnVal = false;
    $("#" + id).find('input[type="radio"]').each(function () {
        if ($(this).is(":checked") && $(this).val() != 0)
            ReturnVal = true;
    });
    return ReturnVal;
}

function validateFBLink(fb_url) {
    var fbregex = "^(https?:\/\/)?((w{3}\.)?)facebook\.com\/(?:[^\s()\\\[\]{};:'\",<>?«»“”‘’]){5,}$";
    return fb_url.match(fbregex);
}

function validateFbTWitterUrl(url) {

    var TwitterRegex = /https?:\/\/(www\.)?twitter\.com\/(#!\/)?[a-z0-9_.\?]+$/i;
    var FacebbokRegex = /https?:\/\/(www\.)?facebook\.com\/[a-zA-Z0-9_.\?]+$/i;
    if ((TwitterRegex.test(url)) || (FacebbokRegex.test(url))) {
        return true;
    } else {
        return false;
    }
}

function validateOneImage(img1, img2, img3, img4) {

    var img_val1 = $("#" + img1).val();
    var img_val2 = $("#" + img2).val();
    var img_val3 = $("#" + img3).val();
    var img_val4 = $("#" + img4).val();

    if (img_val1 != "" || img_val2 != "" || img_val3 != "" || img_val4 != "") {
        return true;
    } else {
        return false;
    }
}

function validateFileUpload(val) {
    if (!/(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$/i.test(val)) {
        return false;
    } else {
        return true;
    }
}
function validateSongUpload(val) {
    if (!/(\.mp3)$/i.test(val)) {
        return false;
    } else {
        return true;
    }
}

function validZip(val){
  if (!/(\.zip)$/i.test(val)) {
        return false;
    } else {
        return true;
    }  
}