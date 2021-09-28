<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Sigmie\Http\JSONRequest;
use Tourware\Client;
use Tourware\Entities\AccommodationContingent;
use Tourware\Entities\AccommodationPeriod;
use Tourware\Entities\AccommodationPricingOption;
use Tourware\Entities\Accomondation;
use Tourware\Entities\AdditionalBookableService;
use Tourware\Entities\Travel;
use Tourware\Operator\Contains;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\QueryRequest;

class EntitiesTest extends TestCase
{
    /**
     * @test
     */
    public function aliases()
    {
        $this->assertEquals('travels', (new Travel)->alias());
        $this->assertEquals('accommodations', (new Accomondation)->alias());
        $this->assertEquals('accommodationscontingents', (new AccommodationContingent)->alias());
        $this->assertEquals('accommodationsperiods', (new AccommodationPeriod)->alias());
        $this->assertEquals('accommodationspricingoptions', (new AccommodationPricingOption)->alias());
        $this->assertEquals('accommodationspricingoptions', (new AdditionalBookableService)->alias());

    }
}
