import { CookieManager } from "../../../Cookies/CookieManager";
const cookie = CookieManager().newInstance();

export const ConfigMenu = function() {
    function eventOpenMenu() {
        $(".config-button").on("click", function(ev) {
            if ($(this).attr("state") === "OFF") {
                $(".config-panel").css({
                    right: 0
                });
                $(this).attr("state", "ON");
            } else {
                $(".config-panel").css({
                    right: -160
                });
                $(this).attr("state", "OFF");
            }
        });
    }

    function initColorChooser() {
        ColorChooser.init();
    }
    function initLangChooser() {
        LangChooser.init();
    }

    function initThemeChooser() {
        ColorThemeChoose.init();
    }

    return {
        init: function() {
            eventOpenMenu();
            initColorChooser();
            initLangChooser();
            initThemeChooser();
        }
    };
};

const ColorChooser = (function() {
    const themes = () => {
        return [
            {
                "1": {
                    "--contrast-color": "rgb(84, 182, 137)",
                    "--contrast-color-secondary": "rgb(147, 193, 172)",
                    "--contrast-color-degree": "rgba(84, 182, 137, 0.808)",
                    "--active-color": "rgb(147, 193, 172)",

                    "--button-primary-color": "rgb(60, 130, 97)",
                    "--button-primary-color-hover": "rgb(60, 123, 83)"
                }
            },
            {
                "2": {
                    "--contrast-color": "rgb(0, 131, 171)",
                    "--contrast-color-secondary": "rgb(0, 102, 133)",
                    "--contrast-color-degree": "rgba(0, 131, 171, 0.808)",
                    "--active-color": "rgb(0, 131, 171)",

                    "--button-primary-color": "rgb(0, 83, 109)",
                    "--button-primary-color-hover": "rgb(0, 64, 83)"
                }
            },
            {
                "3": {
                    "--contrast-color": "rgb(84, 105, 201)",
                    "--contrast-color-secondary": "rgb(74, 93, 176)",
                    "--contrast-color-degree": "rgba(84, 105, 201, 0.808)",
                    "--active-color": "rgb(0, 131, 171)",

                    "--button-primary-color": "rgb(31,39,74)",
                    "--button-primary-color-hover": "rgb(58,72,138)"
                }
            },
            {
                "4": {
                    "--contrast-color": "rgb(95,203,113)",
                    "--contrast-color-secondary": "rgb(102,217,121)",
                    "--contrast-color-degree": "rgba(95,203,113, 0.808)",
                    "--active-color": "rgb(95,236,121)",

                    "--button-primary-color": "rgb(60,140,72)",
                    "--button-primary-color-hover": "rgb(33,77,39)"
                }
            },
            {
                "5": {
                    "--contrast-color": "rgb(238, 167, 59)",
                    "--contrast-color-secondary": "rgb(250, 175, 62)",
                    "--contrast-color-degree": "rgba(238, 167, 59, 0.808)",
                    "--active-color": "rgb(250, 189, 62)",

                    "--button-primary-color": "rgb(173, 121, 43)",
                    "--button-primary-color-hover": "rgb(212, 148, 53)"
                }
            },
            {
                "6": {
                    "--contrast-color": "rgb(108,81,164)",
                    "--contrast-color-secondary": "rgb(130,96,196)",
                    "--contrast-color-degree": "rgba(108,81,164, 0.808)",
                    "--active-color": "rgb(130,96,196)",

                    "--button-primary-color": "rgb(91,67,138)",
                    "--button-primary-color-hover": "rgb(66,49,99)"
                }
            }
        ];
    };

    const applyTheme = theme => {
        let root = document.documentElement;
        let currentColorTheme = null;
        themes().map((value, index) => {
            let currentTheme = value[theme];
            if (currentTheme !== undefined) {
                currentColorTheme = JSON.stringify(currentTheme);
                for (const property in currentTheme) {
                    root.style.setProperty(property, currentTheme[property]);
                }
            }
        });

        cookie.saveCookie("colorTheme", currentColorTheme, 10);
    };

    function eventChooseColor() {
        $("[id='config-panel'] ul[class='chooseColor'] li a")
            .off("click")
            .on("click", function() {
                let theme = $(this)
                    .parent()
                    .attr("data-theme");
                applyTheme(theme);
            });
    }

    return {
        init: function() {
            eventChooseColor();
        }
    };
})();

const LangChooser = (function() {
    return {
        init: function() {}
    };
})();

const ColorThemeChoose = (function() {
    function evThemeChoose() {
        $("[id='config-panel'] input[type='checkbox']")
            .off("change")
            .on("change", function() {
                let darkOnStyle = $(this).prop("checked");
                if (darkOnStyle) {
                    $("body").addClass("dark");
                } else {
                    $("body").removeClass("dark");
                }

                cookie.saveCookie(
                    "typeTheme",
                    darkOnStyle ? "DARK" : "DEFAULT",
                    10
                );
            });
    }
    return {
        init: function() {
            evThemeChoose();
        }
    };
})();
