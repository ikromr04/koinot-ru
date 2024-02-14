<footer class="page-footer">
  <div class="page-footer__top">
    <div class="anim"></div>
    <div class="anim second"></div>
    <div class="anim third"></div>
    <dl class="page-footer__menu">
      <div class="page-footer__menu-list">
        <dt class="page-footer__menu-caption">О нас</dt>

        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('about', 'history') }}">
            История
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('about', 'mission') }}">
            Миссия, Видение, Ценности
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('news') }}">
            Новости
          </a>
        </dd>
      </div>

      <div class="page-footer__menu-list">
        <dt class="page-footer__menu-caption">Полезные ссылки</dt>

        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('projects') }}">
            Компании
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('partnership') }}">
            Партнерство
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('contribution') }}">
            Вклад в общество
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="https://sport.koinotinav.com/" target="_blank">
            Кубок &#8220;КОИНОТИ НАВ&#8221;
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('carrier') }}">
            Карьера
          </a>
        </dd>
        <dd class="page-footer__menu-item">
          <a class="page-footer__menu-link" href="{{ route('contacts') }}">
            Контакты
          </a>
        </dd>
      </div>
    </dl>

    <button class="page-footer__button circle" type="button">
      <svg width="18" height="18">
        <use xlink:href="#more"></use>
      </svg>
    </button>
  </div>

  <div class="page-footer__bottom container">
    <div class="page-footer__details details">
      <a class="details__item" href="mailto:info@koinotinav.tj">
        <span class="details__icon">
          <svg width="18" height="16">
            <use xlink:href="#email"></use>
          </svg>
        </span>
        <span class="details__info">info@koinotinav.tj</span>
      </a>
      <a class="details__item" href="https://t.me/hrkoinotinav" target="_blank">
        <span class="details__icon">
          <svg width="16" height="16">
            <use xlink:href="#telegram"></use>
          </svg>
        </span>
        <span class="details__info">@hrkoinotinav</span>
      </a>
    </div>

    <p class="page-footer__copyright">
      &#169; {{ date('Y') }} ЗАО &#8220;Коиноти нав&#8221;<br>
      Все права защищены</p>
  </div>
</footer>
