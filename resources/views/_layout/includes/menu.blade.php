<nav>
    <ul>
        <li class="menu-title">Utilisateurs</li>
        <li>
            <ul>
                <li>
                    <a href="{{ route('user.index') }}">Liste</a>
                    <a href="{{ route('user.create') }}">Créer</a>
                </li>
            </ul>
        </li>
        
        <li class="menu-title">Evénements</li>
        <li>
            <ul>
                <li>
                    <a href="{{ route('event.index') }}">Liste</a>
                    <a href="{{ route('event.create') }}">Créer</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>