const headers = {
  accept: 'application/json',
  'User-agent': 'learning app',
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};
const formEl = document.querySelector('.form');
const loginFieldEl = formEl.querySelector('input[name="login"]');
const loginFailEl = formEl.querySelector('.form__error--login');
const passwordFieldEl = formEl.querySelector('input[name="password"]');
const passwordFailEl = formEl.querySelector('.form__error--password');
const submitEl = formEl.querySelector('button[type="submit"]');

const Message = {
  NOT_FOUND: 'not found',
  NOT_MATCHED: 'not matched',
  SUCCESS: 'success'
}

const pristine = window.Pristine(formEl, {
  classTo: 'form__element',
  errorClass: 'form__element--invalid',
  successClass: 'form__element--valid',
  errorTextParent: 'form__element',
  errorTextTag: 'div',
  errorTextClass: 'form__error'
}, true);

const initLoginForm = () => {
  formEl.addEventListener('input', () => {
    loginFailEl.textContent = '';
    passwordFailEl.textContent = '';

    loginFieldEl.value && passwordFieldEl.value
      ? submitEl.removeAttribute('disabled')
      : submitEl.setAttribute('disabled', 'disabled');
  });

  formEl.addEventListener('submit', (evt) => {
    evt.preventDefault();

    const isValid = pristine.validate();
    if (isValid) {
      submitEl.setAttribute('disabled', 'disabled');
      submitEl.textContent = 'Вхожу...';

      fetch(formEl.action, {
        headers,
        method: evt.target.method,
        body: new FormData(evt.target)
      })
        .then((response) => response.json())
        .then((response) => {
          switch (response.message) {
            case Message.NOT_FOUND:
              loginFailEl.textContent = 'Мы не узнаем ваш логин';
              break;
            case Message.NOT_MATCHED:
              passwordFailEl.textContent = 'Неверный пароль';
              break;
            case Message.SUCCESS:
              window.location.href = '/';
              break;
          }
          submitEl.innerHTML = 'Войти<svg class="login-form__submit-icon" width="10" height="16"><use xlink:href="#more-icon"></use></svg>';
        })
        .catch((error) => console.error(error));
    }
  });
}

export { initLoginForm };
