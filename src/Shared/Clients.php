<?php

declare(strict_types=1);

namespace Tourware\Shared;

use Tourware\Clients\TravelClient;
use Tourware\Clients\WriteClient;
use Tourware\Contracts\ReadClient;
use Tourware\Entities\AccommodationContingent;
use Tourware\Entities\AccommodationPeriod;
use Tourware\Entities\AccommodationPricingOption;
use Tourware\Entities\Accomondation;
use Tourware\Entities\Activities;
use Tourware\Entities\AdditionalBookableService;
use Tourware\Entities\AdditionalField;
use Tourware\Entities\AdditionalType;
use Tourware\Entities\Agency;
use Tourware\Entities\AgencyCommissionRule;
use Tourware\Entities\AgencyCommissionSchema;
use Tourware\Entities\Airline;
use Tourware\Entities\Airport;
use Tourware\Entities\Attribute;
use Tourware\Entities\CancellationRule;
use Tourware\Entities\CancellationSchema;
use Tourware\Entities\CloneStatus;
use Tourware\Entities\CloudImportConfig;
use Tourware\Entities\Comment;
use Tourware\Entities\Contact;
use Tourware\Entities\ContactCompany;
use Tourware\Entities\Country;
use Tourware\Entities\Currency;
use Tourware\Entities\Destination;
use Tourware\Entities\EmailTemplate;
use Tourware\Entities\File;
use Tourware\Entities\Filter;
use Tourware\Entities\FlightSegment;
use Tourware\Entities\Folder;
use Tourware\Entities\Followup;
use Tourware\Entities\Group;
use Tourware\Entities\ImportDataStatus;
use Tourware\Entities\Itineraryitem;
use Tourware\Entities\ItineraryitemAccommodation;
use Tourware\Entities\ItineraryitemService;
use Tourware\Entities\Language;
use Tourware\Entities\Me;
use Tourware\Entities\MealType;
use Tourware\Entities\NonBookableContent;
use Tourware\Entities\OperationBooking;
use Tourware\Entities\OperationBookingCancellationFee;
use Tourware\Entities\OperationBookingService;
use Tourware\Entities\OperationPassenger;
use Tourware\Entities\OperationPayment;
use Tourware\Entities\OperationRequest;
use Tourware\Entities\OperationsBookingsServicesPaxPrice;
use Tourware\Entities\Pois;
use Tourware\Entities\PriceCategory;
use Tourware\Entities\PriceGroup;
use Tourware\Entities\RecordFollower;
use Tourware\Entities\Relation;
use Tourware\Entities\Resource;
use Tourware\Entities\ResourceRecord;
use Tourware\Entities\Role;
use Tourware\Entities\Roundtrip;
use Tourware\Entities\Setting;
use Tourware\Entities\Subtype;
use Tourware\Entities\Supplier;
use Tourware\Entities\SupplierService;
use Tourware\Entities\SupplierServiceContingent;
use Tourware\Entities\SupplierServicePeriod;
use Tourware\Entities\SupplierServicePricingOption;
use Tourware\Entities\Tag;
use Tourware\Entities\Template;
use Tourware\Entities\Text;
use Tourware\Entities\Travel;
use Tourware\Entities\TravelBrick;
use Tourware\Entities\TravelBrickAccommodation;
use Tourware\Entities\TravelDate;
use Tourware\Entities\TravelPassenger;
use Tourware\Entities\TravelSeason;
use Tourware\Entities\User;
use Tourware\Entities\VacationRental;
use Tourware\Entities\VacationRentalAmenity;
use Tourware\Entities\VacationRentalPeriod;
use Tourware\Entities\VacationRentalPriceModification;

trait Clients
{
    public function me(): ReadClient
    {
        return (new Me())->client($this->http);
    }

    public function airports(): ReadClient
    {
        return (new Airport())->client($this->http);
    }

    public function airlines(): ReadClient
    {
        return (new Airline())->client($this->http);
    }

    public function language(): ReadClient
    {
        return (new Language())->client($this->http);
    }

    public function mealType(): ReadClient
    {
        return (new MealType())->client($this->http);
    }

    public function currency(): ReadClient
    {
        return (new Currency())->client($this->http);
    }

    public function additionalType(): ReadClient
    {
        return (new AdditionalType())->client($this->http);
    }

    public function agency(): ReadClient
    {
        return (new Agency())->client($this->http);
    }

    public function agencyCommissionRule(): ReadClient
    {
        return (new AgencyCommissionRule())->client($this->http);
    }

    public function agencyCommissionSchema(): ReadClient
    {
        return (new AgencyCommissionSchema())->client($this->http);
    }

    public function country(): ReadClient
    {
        return (new Country())->client($this->http);
    }

    public function roundtrip(): ReadClient
    {
        return (new Roundtrip())->client($this->http);
    }

    public function subtype(): ReadClient
    {
        return (new Subtype())->client($this->http);
    }

    public function vacationRentalAmenity(): ReadClient
    {
        return (new VacationRentalAmenity())->client($this->http);
    }

    public function accomondationsContigent(): WriteClient
    {
        return (new AccommodationContingent())->client($this->http);
    }

    public function accomondationPeriod(): WriteClient
    {
        return (new AccommodationPeriod())->client($this->http);
    }

    public function accomondationPricingOption(): WriteClient
    {
        return (new AccommodationPricingOption())->client($this->http);
    }

    public function accomondation(): WriteClient
    {
        return (new Accomondation())->client($this->http);
    }

    public function text(): WriteClient
    {
        return (new Text())->client($this->http);
    }

    public function additionalBookableService(): WriteClient
    {
        return (new AdditionalBookableService())->client($this->http);
    }

    public function additionalField(): WriteClient
    {
        return (new AdditionalField())->client($this->http);
    }

    public function attribute(): WriteClient
    {
        return (new Attribute())->client($this->http);
    }

    public function cancellationRule(): ReadClient
    {
        return (new CancellationRule())->client($this->http);
    }

    public function cancellationSchema(): ReadClient
    {
        return (new CancellationSchema())->client($this->http);
    }

    public function cloneStatus(): WriteClient
    {
        return (new CloneStatus())->client($this->http);
    }

    public function cloudImportConfigs(): WriteClient
    {
        return (new CloudImportConfig())->client($this->http);
    }

    public function comment(): WriteClient
    {
        return (new Comment())->client($this->http);
    }

    public function contact(): WriteClient
    {
        return (new Contact())->client($this->http);
    }

    public function contactCompany(): WriteClient
    {
        return (new ContactCompany())->client($this->http);
    }

    public function destination(): WriteClient
    {
        return (new Destination())->client($this->http);
    }

    public function emailTemplate(): WriteClient
    {
        return (new EmailTemplate())->client($this->http);
    }

    public function file(): WriteClient
    {
        return (new File())->client($this->http);
    }

    public function filter(): WriteClient
    {
        return (new Filter())->client($this->http);
    }

    public function flightSegment(): ReadClient
    {
        return (new FlightSegment())->client($this->http);
    }

    public function folder(): WriteClient
    {
        return (new Folder())->client($this->http);
    }

    public function followup(): WriteClient
    {
        return (new Followup())->client($this->http);
    }

    public function group(): WriteClient
    {
        return (new Group())->client($this->http);
    }

    public function importDataStatus(): WriteClient
    {
        return (new ImportDataStatus())->client($this->http);
    }

    public function iternaryitem(): WriteClient
    {
        return (new Itineraryitem())->client($this->http);
    }

    public function iternaryitemAccomondation(): WriteClient
    {
        return (new ItineraryitemAccommodation())->client($this->http);
    }

    public function iternaryitemService(): WriteClient
    {
        return (new ItineraryitemService())->client($this->http);
    }

    public function nonBookableContent(): WriteClient
    {
        return (new NonBookableContent())->client($this->http);
    }

    public function operationBooking(): WriteClient
    {
        return (new OperationBooking())->client($this->http);
    }

    public function operationBookingCancelationFee(): WriteClient
    {
        return (new OperationBookingCancellationFee())->client($this->http);
    }

    public function operationBookingService(): WriteClient
    {
        return (new OperationBookingService())->client($this->http);
    }

    public function operationPassenger(): WriteClient
    {
        return (new OperationPassenger())->client($this->http);
    }

    public function operationPayment(): WriteClient
    {
        return (new OperationPayment())->client($this->http);
    }

    public function operationRequest(): WriteClient
    {
        return (new OperationRequest())->client($this->http);
    }

    public function operationsBookingsServicesPaxPrice(): ReadClient
    {
        return (new OperationsBookingsServicesPaxPrice())->client($this->http);
    }

    public function pois(): WriteClient
    {
        return (new Pois())->client($this->http);
    }

    public function priceCategory(): WriteClient
    {
        return (new PriceCategory())->client($this->http);
    }

    public function priceGroup(): WriteClient
    {
        return (new PriceGroup())->client($this->http);
    }

    public function recordFollwoer(): WriteClient
    {
        return (new RecordFollower())->client($this->http);
    }

    public function relation(): WriteClient
    {
        return (new Relation())->client($this->http);
    }

    public function resource(): WriteClient
    {
        return (new Resource())->client($this->http);
    }

    public function resourceRecord(): WriteClient
    {
        return (new ResourceRecord())->client($this->http);
    }

    public function role(): WriteClient
    {
        return (new Role())->client($this->http);
    }

    public function settings(): WriteClient
    {
        return (new Setting())->client($this->http);
    }

    public function supplier(): WriteClient
    {
        return (new Supplier())->client($this->http);
    }

    public function supplierService(): WriteClient
    {
        return (new SupplierService())->client($this->http);
    }

    public function supplierServiceContingent(): WriteClient
    {
        return (new SupplierServiceContingent())->client($this->http);
    }

    public function supplierServicePeriod(): WriteClient
    {
        return (new  SupplierServicePeriod())->client($this->http);
    }

    public function supplierServicePricingOption(): WriteClient
    {
        return (new SupplierServicePricingOption())->client($this->http);
    }

    public function tag(): WriteClient
    {
        return (new Tag())->client($this->http);
    }

    public function template(): WriteClient
    {
        return (new Template())->client($this->http);
    }

    public function travel(): TravelClient
    {
        return (new Travel())->client($this->http);
    }

    public function travelBrick(): WriteClient
    {
        return (new TravelBrick())->client($this->http);
    }

    public function travelBrickAccommodation(): WriteClient
    {
        return (new TravelBrickAccommodation())->client($this->http);
    }

    public function activities(): WriteClient
    {
        return (new Activities())->client($this->http);
    }

    public function travelDate(): WriteClient
    {
        return (new TravelDate())->client($this->http);
    }

    public function travelPassenger(): WriteClient
    {
        return (new TravelPassenger())->client($this->http);
    }

    public function travelSeason(): WriteClient
    {
        return (new TravelSeason())->client($this->http);
    }

    public function user(): WriteClient
    {
        return (new User())->client($this->http);
    }

    public function vacationRental(): WriteClient
    {
        return (new VacationRental())->client($this->http);
    }

    public function vacationRentalPeriod(): WriteClient
    {
        return (new VacationRentalPeriod())->client($this->http);
    }

    public function vacationRentalPriceModification(): WriteClient
    {
        return (new VacationRentalPriceModification())->client($this->http);
    }
}
