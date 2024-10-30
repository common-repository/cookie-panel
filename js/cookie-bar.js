var lampCookieUtility = {
    getCookie: function(name) {
        var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    },
    setCookie: function(name, value, days) {
        if(days=="-1"){
            document.cookie = name + "=" + value + ";path=/"
        }
        else {
            var d = new Date;
            d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
            document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
        }
    },
    deleteCookie: function(name){ this.setCookie(name, '', -1); }
};


var lampCookieReInit = function() {
    lampCookieUtility.deleteCookie('lampCookieConsent');
    lampCookieInitCode("0");
};
var lampCookieEventsRegistered = 0;
function lampCookieInitCode(animation_p){
    var animation = animation_p || "1";
    var lampCookieGroups = JSON.parse(document.getElementById('lamp-cookie-consent').innerHTML);

    var lampCookieEnableCookieGrp = function (groupKey){
        if(lampCookieGroups[groupKey] !== undefined){
            for (var key in lampCookieGroups[groupKey]) {
                // skip loop if the property is from prototype
                if (!lampCookieGroups[groupKey].hasOwnProperty(key)) continue;
                var obj = lampCookieGroups[groupKey][key];

                //set the cookie html
                for (var prop in obj) {
                    // skip loop if the property is from prototype
                    if (!obj.hasOwnProperty(prop)) continue;

                    if(Array.isArray(obj[prop])){
                        var content = '';
                        //get the html content
                        obj[prop].forEach(function (htmlContent) {
                            content += htmlContent
                        });
                        var range = document.createRange();
                        if(prop === 'header'){
                            // add the html to header
                            range.selectNode(document.getElementsByTagName('head')[0]);
                            var documentFragHead = range.createContextualFragment(content);
                            document.getElementsByTagName('head')[0].appendChild(documentFragHead);
                        }else{
                            //add the html to body
                            range.selectNode(document.getElementsByTagName('body')[0]);
                            var documentFragBody = range.createContextualFragment(content);
                            document.getElementsByTagName('body')[0].appendChild(documentFragBody);
                        }
                    }
                }
            }
            //remove the group so we don't set it again
            delete lampCookieGroups[groupKey];
        }
    };


    //activates the groups
    var lampCookieSaveAction = function() {
        action = this.getAttribute('data-lamp-cookie-panel-save');
        var checkboxes = document.querySelectorAll('[data-lamp-cookie-panel-grp]');
        var days=364;
        var i;
        var found=false;
        var cookie = '';
        switch (action) {
            case 'all':
                for (i = 0; i < checkboxes.length; i++) {
                    lampCookieEnableCookieGrp(checkboxes[i].value);
                    cookie += checkboxes[i].value + '.1,';
                    checkboxes[i].checked = true;
                }
                break;
            case 'save':
                for (i = 0; i < checkboxes.length; i++) {
                    if(checkboxes[i].checked === true){
                        lampCookieEnableCookieGrp(checkboxes[i].value);
                        if(i>0){
                            found=true;
                        }
                        cookie += checkboxes[i].value + '.1,';
                    }else{
                        cookie += checkboxes[i].value + '.0,';
                    }
                }
                if(!found){
                    days="-1";
                }
                break;
            case 'min':
                break;
        }
        cookie += 'dismiss';
        lampCookieUtility.setCookie('lampCookieConsent',cookie,days);

        setTimeout(function () {
            document.querySelectorAll('[data-lamp-cookie-panel]')[0].classList.toggle('active');
        },350)

    };

    if(lampCookieEventsRegistered === 0) {
        jQuery('.individuell').on( 'click', function () {

            jQuery(".om-cookie-panel.active").css("max-height","unset");
            jQuery( ".cookie-details" ).show().animate({
                height: "100%"
            }, "slow" );
            jQuery( "#cookie-hint-main" ).hide().animate({
                height: "0%"
            }, "slow" );
        });

        jQuery('#coockie-button-back').on( 'click', function () {
            jQuery( ".cookie-details" ).hide().animate({
                height: "0%"
            }, "slow" );
            jQuery( "#cookie-hint-main" ).show().animate({
                height: "100%"
            }, "slow" );
        });
        jQuery('.cookie-center').on( 'click', function (e) {
            jQuery(this).next('.cookie-details-row').toggle();
            e.preventDefault();
        });


    }




    var panelButtons = document.querySelectorAll('[data-lamp-cookie-panel-save]');
    var openButtons = document.querySelectorAll('[data-lamp-cookie-panel-show]');
    var i;
    var lampCookiePanel = document.querySelectorAll('[data-lamp-cookie-panel]')[0];

    if(lampCookiePanel === undefined) return;
    var openCookiePanel = true;


    var cookieConsentData = lampCookieUtility.getCookie('lampCookieConsent');

    if(cookieConsentData !== null && cookieConsentData.length > 0){
        //dont open the panel if we have the cookie
        openCookiePanel = false;
        var checkboxes = document.querySelectorAll('[data-lamp-cookie-panel-grp]');
        var cookieConsentGrps = cookieConsentData.split(',');
        var cookieConsentActiveGrps = '';

        for(i = 0; i < cookieConsentGrps.length; i++){
            if(cookieConsentGrps[i] !== 'dismiss'){
                var grpSettings = cookieConsentGrps[i].split('.');
                if(parseInt(grpSettings[1]) === 1){
                    lampCookieEnableCookieGrp(grpSettings[0]);
                }
            }
        }
    }

    if(openCookiePanel === true){
        if(animation === "1") {

            //timeout, so the user can see the page before he get the nice cookie panel
            setTimeout(function () {
                lampCookiePanel.classList.toggle('active');
            },1000);
        } else {
            lampCookiePanel.classList.toggle('active');
        }
    }


    if(lampCookieEventsRegistered === 0) {
        lampCookieEventsRegistered = 1;

        //check for button click
        for (i = 0; i < panelButtons.length; i++) {
            panelButtons[i].addEventListener('click', lampCookieSaveAction, false);
        }
        for (i = 0; i < openButtons.length; i++) {
            openButtons[i].addEventListener('click', function () {
                lampCookiePanel.classList.toggle('active');
            }, false);
        }

    }


}