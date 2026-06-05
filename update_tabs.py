with open('resources/views/settings/index.blade.php', 'r') as f:
    content = f.read()

# Add php block
php_block = """@php
    $tab = request()->query('tab', 'profile');
@endphp
"""

# Profile
content = content.replace('<!-- Profile Card -->', "@if($tab == 'profile')\n        <!-- Profile Card -->")
content = content.replace('<!-- Notifikasi -->', "@endif\n\n        @if($tab == 'notifications')\n        <!-- Notifikasi -->")
content = content.replace('<!-- Keamanan -->', "@endif\n\n        @if($tab == 'security')\n        <!-- Keamanan -->")
content = content.replace('<!-- Berlangganan & Tagihan -->', "@endif\n\n        @if($tab == 'billing')\n        <!-- Berlangganan & Tagihan -->")
# Danger zone should be part of profile
content = content.replace('<!-- Danger Zone -->', "@endif\n\n        @if($tab == 'profile')\n        <!-- Danger Zone -->")

content = content.replace('    </div>\n</x-layout.app>', '        @endif\n    </div>\n</x-layout.app>')

with open('resources/views/settings/index.blade.php', 'w') as f:
    f.write(php_block + content)

print("Done")
