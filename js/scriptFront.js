// Start Document
$(document).ready(function () {
  const headerTemplate = $("#header");
  const footerTemplate = $("#footer");

  // Load File Template
  headerTemplate.load("template/header.html", function () {
    const dropAccount = $("#account");
    var dropBox = $(".dropbox");

    // Event Dropdown
    dropAccount.click(function () {
      dropBox.show();
    });
    $(window).click(function () {
      if (dropBox.css("display") == "block") {
        $(this).on("click", function () {
          dropBox.toggle();
        });
      }
    });
    $(window).scroll(function () {
      if (dropBox.css("display") == "block") {
        $(this).on("scroll", function () {
          dropBox.toggle();
        });
      }
    });

    // Event Scroll on Header-Navigasi
    $(window).scroll("#menuLink", function () {
      if ($(window).scrollTop() >= 50) {
        $("#menuLink").addClass("floating");
        $(".header-bottom").css("margin-bottom", "40px");
      } else {
        $("#menuLink").removeClass("floating");
        $(".header-bottom").css("margin-bottom", "0px");
      }
    });
  });

  // Load File Template Footer
  footerTemplate.load("template/footer.html", function () {
    console.log("Template berhasil diload");
  });

  // Clear form Input ID Game
  $("#idGame").on("keyup", function () {
    var inputID = $(this);
    var show = $(".form-grup i.fa-times");
    if (inputID.val() === "") {
      show.removeAttr("style");
    } else {
      show.css("display", "block");
      show.click(function () {
        $(this).removeAttr("style");
        inputID.val("");
      });
    }
  });

  // Add class active on List Item
  $(".list-item .item input").click(function () {
    $(".item input").removeAttr("id", "active");
    $(this).attr("id", "active");
  });

  // Check Radio Metode Payment
  $(".item-pay").click(function () {
    let val = $(this).attr("id");
    switch (val) {
      case "bri":
        addAndRemove($(this));
        break;
      case "bni":
        addAndRemove($(this));
        break;
      case "dana":
        addAndRemove($(this));
        break;
      case "ovo":
        addAndRemove($(this));
        break;
      case "shopeepay":
        addAndRemove($(this));
        break;
      case "gopay":
        addAndRemove($(this));
        break;
    }
  });

  function addAndRemove(objDom) {
    $("div.far").removeClass("fa-check");
    $(objDom).children("div.far").addClass("fa-check"); // mengambil element child
  }

  // Hide and Show Element
  $("#vieAll").click(function (e) {
    $("#viewAll").toggle();
  });

  //   End Document
});
