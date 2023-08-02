const signinBtn = document.getElementById("js_login-btn");
const modal_bg = document.querySelector(".js_modal_bg");
const loginModal = document.getElementById("js_login");
const loginStep1 = document.getElementById("js_login-first");
const signInInInput = document.getElementById("signIn");
const signInBtnNext = document.getElementById("signin-btn");
let signinValue = "";

signinBtn.addEventListener("click", () => {
    console.log("222");
  modal_bg.style.display = "block";
  loginModal.classList.remove("hidden");
  loginStep1.classList.remove("hidden");
});

signInInInput.addEventListener("input", (e) => {
  signinValue = e.target.value;
});



signInBtnNext.addEventListener("click", () => {
    fetch("./../app/fetch/loginFetch.php", {
      // 第1引数に送り先
      method: "POST", // メソッド指定
      headers: {
        "Content-Type": "application/json",
      }, // jsonを指定

      body: JSON.stringify(signinValue), // json形式に変換して添付
    })
      .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
      .then((res) => {
        console.log(res); // やりたい処理
        // if (!(res == "error")) {
        //   errorText.style.display = "none";
        //   firstStep.style.display = "none";
        //   signInPassword.style.display = "block";
        //   read.value = res;
        //   let password = "";
        //   pass.addEventListener("input", (e) => {
        //     password = e.target.value;
        //   });
        //   signinCheck.addEventListener("click", () => {
        //     const data = [signinValue, password];
        //     fetch("./session/app/passwordCheckApi.php", {
        //       // 第1引数に送り先
        //       method: "POST", // メソッド指定
        //       headers: {
        //         "Content-Type": "application/json",
        //       }, // jsonを指定

        //       body: JSON.stringify(data), // json形式に変換して添付
        //     })
        //       .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
        //       .then((res) => {
        //         console.log(res);
        //         if (res == "success") {
        //           errorText.style.display = "none";
        //           window.location.replace("./index.php");
        //         } else {
        //           errorText.firstElementChild.innerHTML = "wrong password!";
        //           errorText.style.display = "block";
        //         }
        //       })
        //       .catch((error) => {
        //         console.log(error);
        //       });
        //   });
        // } else {
        //   errorText.style.display = "block";
        // }
      })
      .catch((error) => {
        console.log(error);
      });

});
