const setClipBoard = (text) => {
    if(window.isSecureContext === false){
        alert('安全でないコンテキストと判断されたため、クリップボードへコピーできませんでした。\n'
            + 'HTTPS接続でこの現象が発生した場合は管理者までお知らせください。\n\n'
            + location.host + ' is not secure context.');
        console.error(location.host + ' is not secure context.');
        return false;
    }
    navigator.clipboard.writeText(text).then(() => {
        console.info('Text copied. : ' + text);
        alert('クリップボードにコピーしました');
    }, (err) => {
        console.error('Failed to copy text. : ' + err);
        alert('クリップボードにコピーできませんでした\n開発者ツールから詳細を確認できます');
    });
}

const showMessage = (title, text) => {
    document.getElementById('msgbox-title').innerText = title;
    document.getElementById('msgbox-text').innerText = text;
    document.getElementById('dialog').showModal();
}
