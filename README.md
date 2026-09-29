# Filament – Partners

[![Downloads](https://img.shields.io/packagist/dt/agenciafmd/filament-partners.svg?style=flat-square)](https://packagist.org/packages/agenciafmd/filament-partners)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Adiciona ao Admix o CRUD de parceiros (nome, slug, imagem e, opcionalmente, descrição e URL).

## Requisitos

- PHP ^8.4
- Laravel ^12.0 | ^13.0
- Filament ^5.0
- agenciafmd/filament-admix v1.x-dev | dev-master

## Instalação

1. Instale o pacote via Composer:

```bash
composer require agenciafmd/filament-partners
```

2. Execute as migrações:

```bash
php artisan migrate
```

3. Populando o banco com dados de testes

Adicione o seeder no `database/seeders/DatabaseSeeder.php`:

```php
use Agenciafmd\Partners\Database\Seeders\PartnerSeeder;

$this->call([
    PartnerSeeder::class,
]);
```

Ou rode o seeder manualmente:

```bash
php artisan db:seed --class="Agenciafmd\Partners\Database\Seeders\PartnerSeeder"
```

## Ativando no painel

Adicione o plugin na config do admix `config/filament-admix.php`:

```php
use Agenciafmd\Partners\PartnersPlugin;

return [
    'plugins' => [
        PartnersPlugin::class,
    ],
];
```

Após isso, o menu **Parceiros** aparecerá no painel, com as páginas de Listar, Criar e Editar.

## Configuração

Arquivo: `config/filament-partners.php`

```php
return [
    'name' => 'Partners',
    'navigation_group' => null,
    'navigation_sort' => 9,
    'description' => [
        'visible' => false,
    ],
    'url' => [
        'visible' => false,
    ],
    'image' => [
        'visible' => true,
        'width' => 720,
        'height' => 540,
    ],
];
```

| Chave                 | Padrão     | Descrição                                                     |
|-----------------------|------------|---------------------------------------------------------------|
| `name`                | `Partners` | Nome do pacote.                                               |
| `navigation_group`    | `null`     | Grupo do menu em que o Resource aparece (`null` = sem grupo). |
| `navigation_sort`     | `9`        | Posição do item no menu.                                      |
| `description.visible` | `false`    | Exibe o campo "Descrição" no formulário.                      |
| `url.visible`         | `false`    | Exibe o campo "URL" no formulário.                            |
| `image.visible`       | `true`     | Exibe o campo "Imagem" no formulário.                         |
| `image.width`         | `720`      | Largura, em pixels, para o redimensionamento da imagem.       |
| `image.height`        | `540`      | Altura, em pixels, para o redimensionamento da imagem.        |

Parceiros na lixeira há mais de 30 dias são removidos pelo `model:prune`, agendado diariamente às 03h (minuto definido em `filament-admix.schedule.minutes`).

## Permissões

O `PartnerResource` entra automaticamente no controle de permissões por Grupos do Admix. Usuários sem grupo são administradores e têm acesso total.

## Auditoria

O `PartnerResource` inclui o relation manager `Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager`, exibindo o histórico de auditorias do registro.

## Licença

Este pacote é software livre e está disponível nos termos da licença MIT.
