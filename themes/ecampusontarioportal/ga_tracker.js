
var tracker = (function () {

    function trackTextbookDownload(downloadType, textbookName) {
        ///<summary>
        ///Sends events that relate to courses
        ///</summary>
        sendEvent(
            category   = 'Textbook-Download',
            action     = downloadType,
            label      = textbookName
         );
    }

    function sendEvent(category, action, label, dimensions) {
        ///<summary>
        /// Sends the event to Google Analytics
        /// eventCategory = The category of the event to send
        /// eventAction = The action of the event (eg: Course Enrol Clicked)
        /// eventLabel = A string that describes the event
        /// dimensions = all custom dimensions in an anon object that gets merged into the base dimensions
        ///</summary>
        var baseDimensions = {
            hitType      : 'event',
            eventCategory: category,
            eventAction  : action,
            eventLabel   : label
        };

        ga('send', (dimensions == null) ? baseDimensions : $.extend(baseDimensions, dimensions));
        gtag('event', label, { 'event_category': category, 'event_label': label, 'event_action': action });
    }
  


    return {
        ///<summary>
        /// The methods that are visible to calling scripts
        ///</summary>
        trackTextbookDownload  : trackTextbookDownload,
		sendEvent			   : sendEvent

    }
})();



