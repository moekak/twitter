const signupBtn = document.getElementById("js_signup-btn");
const modal_bg = document.querySelector(".js_modal_bg");
const signupModal = document.getElementById("js_register");
const step1 = document.getElementById("js_step_first");
const submitBtn = document.getElementById("js_submit_btn");

// signup modal を開く
signupBtn.addEventListener("click", () => {
  modal_bg.classList.remove("hidden");
  signupModal.style.display = "flex";
  step1.classList.remove("hidden");
});

// ============================ ステップ1 ==================================
const createBtn = document.getElementById("js_create-btn");
const step2 = document.getElementById("js_step_second");
const nextBtn1 = document.getElementById("js_nextBtn1");

createBtn.addEventListener("click", () => {
  step2.classList.remove("hidden");
  step1.classList.add("hidden");
});

// validation check
const inputName = document.getElementById("js_name_input");
const inputPhone = document.getElementById("js_phone_input");
const selectMonth = document.getElementById("js_month");
const selectDay = document.getElementById("js_day");
const selectYear = document.getElementById("js_year");

// 電話番号チェックで使うアラート文
const alert1 = document.getElementById("js_alert1");
const alert2 = document.getElementById("js_alert2");

let nameValue = "";
let phoneValue = "";
let yearValue = "";
let monthValue = "";
let dayValue = "";
let passwordValue ="";

document.addEventListener("input", (e) => {
  //input fieldに入力された値を取得する
  nameValue = inputName.value;
  phoneValue = inputPhone.value;
  yearValue = selectYear.value;
  monthValue = selectMonth.value;
  dayValue = selectDay.value;

  // 1. 電話番号のvalidayion check
  const phoneRegex = /^\d{10,11}$/;

  // 1. 1 電話番号のinput field に入力されたときに基づいてスタイルを変える
  inputPhone.addEventListener("input", (e) => {
    phoneValue = inputPhone.value;
    if (phoneRegex.test(phoneValue)) {
      alert1.classList.add("hidden");
      inputPhone.style.border = "1px solid rgba(0, 0, 0, 0.185)";
    } else if (phoneValue == "") {
      if (document.activeElement == inputPhone) {
        alert1.classList.add("hidden");
        inputPhone.style.border = "2px solid rgba(29, 161, 242)";
      }
    } else {
      alert1.classList.remove("hidden");
      inputPhone.style.outline = "none";
      inputPhone.style.border = "2px solid red";
    }
  });
  inputPhone.addEventListener("blur", () => {
    alert1.classList.add("hidden");
    inputPhone.style.border = "1px solid rgba(0, 0, 0, 0.185)";
  });
  inputPhone.addEventListener("focus", () => {
    alert1.classList.add("hidden");
    inputPhone.style.border = "1px solid rgba(29, 161, 242)";
  });

  //   2. 全てのinput fieldに値が入っているかチェック

  if (
    !(nameValue == "") &&
    !phoneValue == "" &&
    phoneRegex.test(phoneValue) &&
    !(yearValue == "Year") &&
    !(yearValue == "") &&
    !(monthValue == "Month") &&
    !(monthValue == "") &&
    !(dayValue == "Day") &&
    !(dayValue == "")
  ) {
    nextBtn1.style.pointerEvents = "auto";
    nextBtn1.style.backgroundColor = "black";
  } else {
    nextBtn1.style.pointerEvents = "none";
    nextBtn1.style.backgroundColor = "rgba(0, 0, 0, 0.637)";
  }

  // ============================ ステップ2 ==================================
  const step3 = document.getElementById("js_step_third");
  const inputName_check = document.getElementById("js_name_check");
  const inputPhone_check = document.getElementById("js_phone_check");
  const inputBD_check = document.getElementById("js_bd_check");

  // アイコン
  const checked1 = document.getElementById("js_check1");
  const checked2 = document.getElementById("js_check2");
  const checked3 = document.getElementById("js_check3");

  const error1 = document.getElementById("js_error1");
  const error2 = document.getElementById("js_error2");
  const error3 = document.getElementById("js_error3");

  nextBtn1.addEventListener("click", () => {
    step2.classList.add("hidden");
    step3.classList.remove("hidden");
  });

  if (nameValue) {
    inputName_check.value = nameValue;
    checked1.style.display = "block";
    error1.style.display = "none";
  } else {
    inputName_check.value = "";
    checked1.style.display = "none";
    error1.style.display = "block";
  }
  if (phoneValue) {
    inputPhone_check.value = phoneValue;
    checked2.style.display = "block";
    error2.style.display = "none";
  } else {
    inputPhone_check.value = "";
    checked2.style.display = "none";
    error2.style.display = "block";
  }
  if (dayValue && monthValue && yearValue) {
    const date = monthValue + " " + dayValue + "," + yearValue;
    inputBD_check.value = date;
    checked3.style.display = "block";
    error3.style.display = "none";
  } else {
    inputBD_check.value = "";
    checked3.style.display = "none";
    error3.style.display = "block";
  }

  // ================================= ステップ3 ================================
  const signupBtn = document.getElementById("js_signUp_btn");
  const step4 = document.getElementById("js_step_forth");
  const inputPassword = document.getElementById("js_input_password");


  signupBtn.addEventListener("click", () => {
    step3.classList.add("hidden");
    step4.classList.remove("hidden");
  });

  // 1. パスワードチェック

  passwordValue = inputPassword.value;

  const length = document.querySelector(".length-check");
  const lower = document.querySelector(".contain-lower");
  const upper = document.querySelector(".contain-upper");
  const num = document.querySelector(".contain-num");
  const special = document.querySelector(".contain-special");

  const pattern1 = /.{8,}/;
  // 小文字が含まれているか
  const pattern2 = /[a-z]/;
  // 一つ以上の数字が含まれているか
  const pattern3 = /[0-9]/;
  // 一つ以上の記号が含まれているか
  const pattern4 = /[^a-zA-Z\d]/;
  // 大文字が含まれているか
  const pattern5 = /[A-Z]/;

  let check1 = false;
  let check2 = false;
  let check3 = false;
  let check4 = false;
  let check5 = false;

  const checkPassword = (pattern, error, check) => {
    if (pattern.test(passwordValue)) {
      error.style.color = "green";
      return true;
    } else {
      error.style.color = "red";
      return false;
    }
  };

  check1 = checkPassword(pattern1, length);
  check2 = checkPassword(pattern2, lower);
  check3 = checkPassword(pattern3, num, check3);
  check4 = checkPassword(pattern4, special, check4);
  check5 = checkPassword(pattern5, upper, check5);

  // validationが全部trueだったときの処理
  if (check1 && check2 && check3 && check4 && check5) {
    submitBtn.style.pointerEvents = "auto";
    submitBtn.style.backgroundColor = "var(--blue)";
  } else {
    submitBtn.style.pointerEvents = "none";
    submitBtn.style.backgroundColor = " rgba(0, 0, 0, 0.521)";
  }

  // ==================================　ステップ4 ======================================

  
});

submitBtn.addEventListener("click", () => {
  // step3.classList.add("hidden");
  // const data = {
  //   name: nameValue,
  //   phone: phoneValue,
  //   password: passwordValue,
  // };

  const data = [
    nameValue,
    phoneValue,
    monthValue + " " + dayValue + "," + yearValue,
    passwordValue,
  ];

  fetch("./../app/fetch/signupFetch.php", {
    // 第1引数に送り先
    method: "POST", // メソッド指定
    headers: {
      "Content-Type": "application/json",
    }, // jsonを指定

    body: JSON.stringify(data), // json形式に変換して添付
  })
    .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
    .then((res) => {
      console.log(res); // やりたい処理
      
    })
    .catch((error) => {
      console.log(error);
    });
});
