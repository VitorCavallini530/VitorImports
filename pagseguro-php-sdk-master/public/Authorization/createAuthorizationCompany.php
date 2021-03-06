<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

require_once "../../vendor/autoload.php";

try {
    \PagSeguro\Library::initialize();
} catch (Exception $e) {
    die($e);
}
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

$authorization = new \PagSeguro\Domains\Requests\Authorization();

$authorization->setReference("AUTH_LIB_PHP_0001");
$authorization->setRedirectUrl("http://www.lojamodelo.com.br");
$authorization->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");

$authorization->addPermission(\PagSeguro\Enum\Authorization\Permissions::CREATE_CHECKOUTS);
$authorization->addPermission(\PagSeguro\Enum\Authorization\Permissions::SEARCH_TRANSACTIONS);
$authorization->addPermission(\PagSeguro\Enum\Authorization\Permissions::RECEIVE_TRANSACTION_NOTIFICATIONS);
$authorization->addPermission(\PagSeguro\Enum\Authorization\Permissions::MANAGE_PAYMENT_PRE_APPROVALS);
$authorization->addPermission(\PagSeguro\Enum\Authorization\Permissions::DIRECT_PAYMENT);

$partner = new \PagSeguro\Domains\Authorization\Partner(
    'John Doe',
    new DateTime(),
    new \PagSeguro\Domains\Document('CPF', '00000000000'),
    new \PagSeguro\Domains\Phone('00', '000000000', \PagSeguro\Enum\Authorization\PhoneEnum::HOME)
);

$person = new \PagSeguro\Domains\Authorization\Company(
    'John Doe',
    'http://www.example.com',
    new \PagSeguro\Domains\Document('CPF', '00000000000'),
    new \PagSeguro\Domains\Phone('00', '000000000', \PagSeguro\Enum\Authorization\PhoneEnum::BUSINESS),
    new \PagSeguro\Domains\Address('Rua Um',
        '1',
        'Sem complemento',
        'Bairro',
        '00000000',
        'Cidade',
        'UF',
        'BRA'),
    $partner);

/**
 * Com o m??todo a seguir ?? poss??vel especificar outros telefones
 *
 * Os tipos de telefone permitidos s??o HOME, MOBILE e BUSINESS.
 */
$person->addPhones(new \PagSeguro\Domains\Phone('00', '000000000', \PagSeguro\Enum\Authorization\PhoneEnum::HOME));
$person->addPhones(new \PagSeguro\Domains\Phone('00', '000000000', \PagSeguro\Enum\Authorization\PhoneEnum::BUSINESS));

$account = new \PagSeguro\Domains\Authorization\Account('john@doe.com', $person);

$authorization->setAccount($account);

try {
    $response = $authorization->register(
        \PagSeguro\Configuration\Configure::getApplicationCredentials()
    );
    echo "<h2>Criando requisi&ccedil;&atilde;o de authoriza????o</h2>"
        . "<p>URL do pagamento: <strong>$response</strong></p>"
        . "<p><a title=\"URL de Autoriza????o\" href=\"$response\" target=\_blank\">"
        . "Ir para URL de authoriza????o.</a></p>";
} catch (Exception $e) {
    die($e->getMessage());
}
