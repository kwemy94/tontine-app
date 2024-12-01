// Example POST method implementation:
async function postData(url = "", data, method = "POST") {
    // Default options are marked with *
    const response = await fetch(url, {
        method: method, // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": $('input[name="_token"]').val(),
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },

        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data), // body data type must match "Content-Type" header
    });

    return response.json(); // parses JSON response into native JavaScript objects
}

// Example POST method implementation:
async function getFetch(url, data, method) {
    // Default options are marked with *

    const response = await fetch(url, {
        method: "GET", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        data: data,
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": $('input[name="_token"]').val(),
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    });

    return response.json(); // parses JSON response into native JavaScript objects
}

function formatFormData(form) {
    let fields = form.serializeArray(),
        formData = {};
    $.each(fields, function (i, field) {
        formData[field.name] = field.value;
    });
    return formData;
}

function uploadImage(source, url) {
    let imageSource = $("#loadedImage").val(source);
    console.log(imageSource);
    const formData = new FormData();
    formData.append("images", imageSource);
    formData.append("array", "true");
}

const submitFetch = async (url, method = "GET") => {
    const response = await fetch(url, {
        // Your POST endpoint
        method: method,
        mode: "no-cors",
    });
    return response.json();
};

loadChart = function (divTag, donutData) {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    let pieChartCanvas = $("#" + divTag)
        .get(0)
        .getContext("2d");
    let pieData = donutData;
    let pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
        type: "pie",
        data: pieData,
        options: pieOptions,
    });
};



const ajaxSubmitForm = async (form, dataType = "json") => {
    let data = new FormData(form[0]);
    let url = form.attr("action"),
        method = form.attr("method");
    if (data) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                method: method,
                data: data,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                dataType: dataType,
            })
                .done((response) => {
                    resolve(response);
                })
                .fail((error) => {
                    reject(error);
                });
        });
    } else {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                method: method,
                data: data,
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                dataType: dataType,
            })
                .done((response) => {
                    resolve(response);
                })
                .fail((error) => {
                    reject(error);
                });
        });
    }
};


const submitFormData = async (formData, url, method = 'POST', dataType = "json") => {
    let response = await fetch(url, {
        method: method,
        headers: {
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        body: formData,
    });
    console.log(response);
    return await response.json();

};

function ControlRequiredFields(inputs = $('.required')) {
    let success = true;
    console.log('nbre champ requis : ' + inputs.length);
    for (let i = 0; i < inputs.length; i++) {
        if ($(inputs[i]).val() == null || $(inputs[i]).val().trim() == '') { // trim permet d'enlever les tabulation inutile sur un champ
            $(inputs[i]).addClass('error');
            success = false;
        } else {
            $(inputs[i]).removeClass('error');
        }
    }

    return success;
}

async function postData2(url = "", data, method = "POST") {
    // Default options are marked with *
    const response = await fetch(url, {
        method: method, // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        contentType: "multipart/form-data",
        headers: {
            //"Content-Type": "application/json",
            "X-CSRF-Token": $('input[name="_token"]').val(),
        },

        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: data, // body data type must match "Content-Type" header    JSON.stringify(data)
    });

    return response.json(); // parses JSON response into native JavaScript objects
}
