const setClipBoard = (text) => {
    navigator.clipboard.writeText(text).then(() => {
        console.info('Text copied. : ' + text);
        alert('クリップボードにコピーしました');
    }, (err) => {
        console.error('Failed to copy text. : ' + err);
        alert('クリップボードにコピーできませんでした\n開発者ツールから詳細を確認できます');
    });
}
