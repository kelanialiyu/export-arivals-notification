let exportNotification = {
    agent:"",
    acceptTerms:false,
    containers:[]
};

let counter =0;


/* Validations */
const validateEntry =(type, value)=>{
    let msg = ""
    if(!value){
        msg = "Required"
    }
    else{
        if(typeof value === "string"){
            value = value.trim();
        }
        switch (type) {
            case "containerNo":
                if(!RegExp(/[a-zA-Z]{4}[0-9]{7}/).test(value)){
                    msg="invalid container number"
                };
                break;

            case "vgm":
                if(typeof value !== "string"){
                    msg="invalid vgm"
                };
                break;

            default:
                break;
        }
    }

    return msg
};

const validateBookingField = (pid, fieldtype="input") =>{
    let parent = document.querySelector(`#${pid}`);
    let input = parent.querySelector(fieldtype);
    let error = parent.querySelector("div.invalid-feedback");
    let type = pid.split("-")[1];
    let msg = validateEntry(type, input.value);
    if(msg){
        error.innerHTML = msg;
        input.classList.add("is-invalid");
        return false
    }
    else{
        input.classList.remove("is-invalid");
        error.innerHTML = msg;
        return true
    }
}

const validateAgent = (agent) =>{
    let agentEl = document.querySelector("#agent");
    let agentParent = agentEl.parentElement;
    let error = agentParent.querySelector("div.invalid-feedback");
    if(!agent){
        error.innerHTML = "Agent is required";
        agentEl.classList.add("is-invalid");
        return false
    }
    agentEl.classList.remove("is-invalid");
    error.innerHTML = "";
    return true
}

const validateTerms = (terms) =>{
    let termsEl = document.querySelector("#terms");
    let termsErrorEl = document.querySelector("#terms-error");
    if(terms){
        termsErrorEl.classList.remove("tx-danger");
        return true
    }
    else{
        termsErrorEl.classList.add("tx-danger");
        return false
    }
}

const validatebookingInfo = () =>{
    if(!exportNotification?.containers?.length){
        bookingInfoErrors.innerHTML = "At least one booking information is required";
        return false
    }
    else{
        bookingInfoErrors.innerHTML = "";
        return true
    }
}
/* End Validations */

/* Data Update */
const updateAgent = agent =>{
    validateAgent(agent);
    exportNotification = {...exportNotification, agent};
}

const updateBookingInfo =(id,data)=>{
    let containers = exportNotification?.containers?.map(container => container?.id == id? {...container, ...data}:container);
    exportNotification = {...exportNotification, containers}
    paint()
}

const updateAcceptTerms = acceptTerms =>{
    exportNotification = {...exportNotification, acceptTerms}
}

const addBookingInfo = (bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper)=>{
    vgm = Math.floor(parseInt(vgm)||0);
    console.log("right")
    let id =`BookingInfo${counter++}`
    exportNotification?.containers?.push({id,bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper})
    validatebookingInfo(exportNotification?.containers)
    paint();
}

const removeBookingInfo = id =>{
    let containers = exportNotification?.containers?.filter(bookingInfo =>bookingInfo?.id !== id);
    exportNotification = {...exportNotification, containers}
    validatebookingInfo(exportNotification?.containers)
    paint();
}
/* End Data Update */

/* Data Retrieval */
const getBookingInfo = id =>{
    return exportNotification?.containers?.find(bookingInfo =>bookingInfo?.id == id);
}

const getOperator= id =>{
    return window?.globalOperators?.find(operator => operator?.id == id)
}

const getIso= id =>{
    return window?.globalIsos?.find(iso => iso?.id == id)
}
/* End Data Retrieval */

/* UI Update */
const paint = () =>{
    const tableBody = document.querySelector("#bookingInformation");
    let tableData =""
    if(exportNotification?.containers?.length <1){
        tableData = `
        <tr>
            <td class="wd-10p" colspan="10">
                <p class="">No Booking information added</p>
            </td>
        </tr>
        `
    }
    else{
        for (const container of exportNotification?.containers) {
            let {id,bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper} = container
            tableData = `
            <tr>
                <td class="wd-10p">
                    <div class="d-flex justify-content-sm-between">
                        <button class="btn btn-warning btn-icon rounded-circle mx-1" data-toggle="modal" data-target="#bookingInfoModal" data-id-b="${id}">
                            <div><i class="fa fa-edit"></i></div>
                        </button>
                        <button class="btn btn-danger btn-icon rounded-circle mx-1" onclick="removeBookingInfo('${id}')">
                            <div><i class="fa fa-trash"></i></div>
                        </button>
                    </div>
                </td>
                <td class="wd-35p">${bookingNo.toString().toUpperCase()}</td>
                <td class="wd-35p">${containerNo.toString().toUpperCase()}</td>
                <td class="wd-35p">${parseFloat(vgm).toFixed(2).toLocaleString("en-US")}</td>
                <td class="wd-35p">${vessel.toString().toUpperCase()}</td>
                <td class="wd-20p">${portOfDischarge.toString().toUpperCase()}</td>
                <td class="wd-20p">${commodity.toString().toUpperCase()}</td>
                <td class="wd-20p">${shipper.toString().toUpperCase()}</td>
                <td class="wd-20p">${getIso(iso)?`${getIso(iso)?.name} ${getIso(iso)?.code}`:"N/A"}</td>
                <td class="wd-20p">${getOperator(operator)?.name || "N/A"}</td>
            </tr>
            ${tableData}
            `
        }
    }
    tableBody.innerHTML = tableData
}

const resetField = (id, fieldtype="input") =>{
    let parent = document.querySelector(`#${id}`).parentElement;
    let input = parent.querySelector(fieldtype);
    let error = parent.querySelector("div.invalid-feedback");
    input.classList.remove("is-invalid");
    error.innerHTML = "";
    input.value = "";
}

const resetBookingField = (pid, fieldtype="input") =>{
    let parent = document.querySelector(`#${pid}`);
    let input = parent.querySelector(fieldtype);
    let error = parent.querySelector("div.invalid-feedback");
    input.classList.remove("is-invalid");
    error.innerHTML = "";
    input.value = "";
}

const setBookingField = (pid,value, fieldtype="input") =>{
    resetBookingField(pid, fieldtype)
    let parent = document.querySelector(`#${pid}`);
    let input = parent.querySelector(fieldtype);
    input.value = value;
}

const toggleLoading = load =>{
    let loading = document.querySelector("#loading");
    if(load){
        loading.classList.remove("d-none");
        loading.classList.add("d-flex");
    }
    else{
        loading.classList.add("d-none");
        loading.classList.remove("d-flex");
    }
}

const showAddBookingInfoForm = () =>{
    $("#bookingInfoModal").modal("show");
}

const showAddBatchBookingInfoForm = () =>{
    $("#bookingInfoUploadModal").modal("show");
}
/* End UI Update */

/* UI Data Retrieval */
getFieldValue = (id, fieldtype="input") =>{
    let parent = document.querySelector(`#form-${id}`);
    let input = parent?.querySelector(fieldtype);
    return input.value
}
/* End UI Data Retrieval */

/* API Interactions */
function postData(url = '', data = {}) {
    // Default options are marked with *
    const response =  fetch(url, {
      method: 'POST', // *GET, POST, PUT, DELETE, etc.
      mode: 'cors', // no-cors, *cors, same-origin
      cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
      credentials: 'same-origin', // include, *same-origin, omit
      headers: {
        'Content-Type': 'application/json'
        // 'Content-Type': 'application/x-www-form-urlencoded',
      },
      redirect: 'follow', // manual, *follow, error
      referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
      body: JSON.stringify(data) // body data type must match "Content-Type" header
    });
    return response; // parses JSON response into native JavaScript objects
}

const saveNotification =  () =>{
    let response =  postData('/api/exports',exportNotification);
    console.log(response)
    response.then(
        res=>{
            if(res.status === 200){
                $("#successModal").modal("show")
                exportNotification={
                    agent:"",
                    acceptTerms:false,
                    containers:[]
                };
                counter =0;
                resetField("agent");
                $("#terms").prop("checked",false);
                paint();
                toggleLoading(false);
            }
            else{
                $("#errorModal").modal("show")
                toggleLoading(false);
            }
        }
        ,
        err=>{
            $("#errorModal").modal("show")
            console.err(err)
            toggleLoading(false)
        })

}
/*End API interactions */

/* Mega Function */
const newBookingInfo = id =>{
    let bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper
    bookingNo = getFieldValue("bookingNo")
    containerNo = getFieldValue("containerNo")
    iso = getFieldValue("iso","select")
    operator = getFieldValue("operator","select")
    vessel = getFieldValue("vessel")
    portOfDischarge = getFieldValue("portOfDischarge")
    commodity = getFieldValue("commodity")
    vgm = getFieldValue("vgm")
    shipper = getFieldValue("shipper")
    let validData = true
    validData = validateBookingField("form-bookingNo") && validData
    validData = validateBookingField("form-containerNo") && validData
    validData = validateBookingField("form-iso","select") && validData
    validData = validateBookingField("form-operator","select") && validData
    validData = validateBookingField("form-vessel") && validData
    validData = validateBookingField("form-portOfDischarge") && validData
    validData = validateBookingField("form-commodity") && validData
    validData = validateBookingField("form-vgm") && validData
    validData = validateBookingField("form-shipper") && validData
    if(validData){
        if(id){
            updateBookingInfo(id,{bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper})
        }else{
            addBookingInfo(bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper)
        }
        resetBookingField("form-bookingNo")
        resetBookingField("form-containerNo")
        resetBookingField("form-iso","select")
        resetBookingField("form-operator","select")
        resetBookingField("form-vessel")
        resetBookingField("form-portOfDischarge")
        resetBookingField("form-commodity")
        resetBookingField("form-vgm")
        resetBookingField("form-shipper")
        $("#bookingInfoModal").modal("hide");
    }
}

const submitNotification = () =>{
    let validData = true
    validData = validateAgent(exportNotification?.agent) && validData
    validData = validatebookingInfo(exportNotification?.containers) && validData
    validData = validateTerms(exportNotification?.acceptTerms) && validData

    if(validData){
        toggleLoading(true)
        saveNotification()
    }
}
/* End Mega Function */

/* Event Listeners */
$("#terms").on("change",function(e){
    let acceptTerms = e.currentTarget.checked;
    validateTerms(acceptTerms);
    if(acceptTerms){
        $("#notificationSubmit").removeAttr("disabled")
    }
    else{
        $("#notificationSubmit").attr("disabled","disabled")
    }
    updateAcceptTerms(acceptTerms);
});

$("#agent").on("keyup",function(e){
    updateAgent(e.currentTarget.value)
});

$("#bookingInfoModal").on("show.bs.modal", function (event) {
    let button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id-b') ||""// Extract info from data-* attributes
    let data = getBookingInfo(id)
    let modal = $(this)
    if(data){
        console.log("wrong")
        let {bookingNo,containerNo,iso,operator,vessel,portOfDischarge,commodity,vgm,shipper} = data
        setBookingField("form-bookingNo",bookingNo||"")
        setBookingField("form-containerNo",containerNo||"")
        setBookingField("form-iso",iso ||"", "select")
        setBookingField("form-operator",operator||"","select")
        setBookingField("form-vessel",vessel||"")
        setBookingField("form-portOfDischarge",portOfDischarge||"")
        setBookingField("form-commodity",commodity||"")
        setBookingField("form-vgm",vgm||"")
        setBookingField("form-shipper",shipper||"")
        modal.find('#submit').attr('onclick',`newBookingInfo('${id}')`)
    }
    modal.find('#submit').attr('onclick',`newBookingInfo('${id}')`)
})

$("#notificationSubmit").on("click",()=>{
    submitNotification()
})

$("document").ready(()=>{
    paint()
})
/* End Event Listeners */


