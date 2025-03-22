// モーダル画面表示
const deleteButton = document.getElementById('delete-button');
const modalBackGround = document.getElementById('js-modal-bg');
const modalContainer = document.getElementById("js-modal-container");
const cancelButton = document.getElementById('cancel-button');
// const confirmButton = document.getElementById('confirm-button');

// モーダル画面（確認ウィンドウ表示）
deleteButton.addEventListener('click', () => {
  modalBackGround.classList.remove("hidden");
  modalContainer.classList.remove('hidden');
  modalContainer.classList.add('transition');
});

// モーダル非表示（キャンセルボタン押下時）
cancelButton.addEventListener('click', () => {
  modalBackGround.classList.add('hidden');
  modalContainer.classList.add('hidden');
})
