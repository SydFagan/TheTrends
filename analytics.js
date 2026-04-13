let startTime = Date.now();

window.addEventListener('beforeunload', () => {
    let timeSpent = Math.round((Date.now() - startTime) / 1000);

    navigator.sendBeacon(analyticsData.ajax_url, JSON.stringify({
        action: 'track_time',
        time: timeSpent,
        url: window.location.href
    }));
});

window.addEventListener('scroll', () => {
    let scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);

    if (scrollPercent % 25 === 0) {
        fetch(analyticsData.ajax_url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=track_scroll&scroll=${scrollPercent}&url=${window.location.href}`
        });
    }
});
