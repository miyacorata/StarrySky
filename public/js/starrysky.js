const setClipBoard = (text) => {
    if(window.isSecureContext === false){
        showMessage('エラー','安全でないコンテキストと判断されたため、クリップボードへコピーできませんでした。\n'
            + 'HTTPS接続でこの現象が発生した場合は管理者までお知らせください。\n\n'
            + location.host + ' is not secure context.');
        console.error(location.host + ' is not secure context.');
        return false;
    }
    navigator.clipboard.writeText(text).then(() => {
        console.info('Text copied. : ' + text);
        showMessage('通知','クリップボードにコピーしました');
    }, (err) => {
        console.error('Failed to copy text. : ' + err);
        showMessage('エラー','クリップボードにコピーできませんでした\n開発者ツールから詳細を確認できます');
    });
}

const showMessage = (title, text) => {
    document.getElementById('msgbox-title').innerText = title;
    document.getElementById('msgbox-text').innerText = text;
    document.getElementById('dialog').showModal();
}

document.addEventListener('DOMContentLoaded',()=>{

    const linkDialogClose = document.getElementById('link-dialog-close');
    linkDialogClose.addEventListener('click',()=>{
            document.getElementById('link-dialog').close();
    });

    document.querySelectorAll('#document a[href]').forEach((el) => {
        if(!el.href.startsWith(location.protocol+'//'+location.host)){
            el.addEventListener('click',(e)=>{
                e.preventDefault();
                document.getElementById('link-dialog-link').innerText = el.href;
                const jumpButton = document.getElementById('link-dialog-submit');
                jumpButton.setAttribute('href',el.href);
                jumpButton.addEventListener('click', ()=>{ linkDialogClose.click() });
                document.getElementById('link-dialog').showModal();
            });
        }
    });
});
