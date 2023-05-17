abstract class Ship {
  protected name: string;
  protected lengthSize: number;
  protected shipType: string;
  protected bootsType: string;
  constructor(name: string, lengthSize: number, bootsType: string) {
    this.name = name;
    this.lengthSize = lengthSize;
    this.bootsType = bootsType;
  }

  protected setTypeShip(type: string): void {
    this.shipType = type;
  }

  public getName(): string {
    return this.name;
  }

  public getLengthSize(): number {
    return this.lengthSize;
  }

  public getShipInfo(): object {
    return {
      typeShip: this.shipType,
      nameShip: this.name,
      lengthSize: this.lengthSize,
      bootsType: this.bootsType,
    };
  }
}

class MotorBoats extends Ship {
  typeEngine: string;
  constructor(name: string, lengthSize: number, typeEngine: string) {
    super(name, lengthSize, "motor boats");
    this.setTypeShip(typeEngine);
  }

  public getTypeEngine(): string {
    return this.typeEngine;
  }

  public getInfo(): any {
    return this.getShipInfo();
  }
}

class SailBoats extends Ship {
  typeEngine: string;
  hullType: string;
  constructor(
    name: string,
    lengthSize: number,
    typeEngine: string,
    hullType: string
  ) {
    super(name, lengthSize, "sail boats");
    this.setTypeShip(typeEngine);
    this.hullType = hullType;
  }

  public getTypeEngine(): string {
    return this.typeEngine;
  }

  public getInfo(): any {
    const hullInfo = { hullType: this.hullType };
    const data = { ...this.getShipInfo(), ...hullInfo };
    return data;
  }
}

class YachtsBoats extends Ship {
  typeEngine: string;
  hullType: string;
  fullType: string;
  constructor(
    name: string,
    lengthSize: number,
    typeEngine: string,
    hullType: string,
    fullType: string
  ) {
    super(name, lengthSize, "yacht boats");
    this.setTypeShip(typeEngine);
    this.hullType = hullType;
    this.fullType = fullType;
  }

  public getTypeEngine(): string {
    return this.typeEngine;
  }

  public getInfo(): any {
    const anotherInfo = { hullType: this.hullType, fullType: this.fullType };
    const data = { ...this.getShipInfo(), ...anotherInfo };
    return data;
  }
}

const motorBoats = new MotorBoats(
  "MotorBoat EX149",
  20,
  "Ship Moto Board D492"
);

const sailBoats = new SailBoats(
  "1998 Catalina 34 Mkll",
  35,
  "Catalina",
  "Monohull Fiberglass"
);

const yachtBoats = new YachtsBoats(
  "2022 Princess X95",
  96,
  "Princess",
  "Monohull Fiberglass",
  "Diesel"
);

console.log("motor boards:", motorBoats.getInfo());
console.log("sail boats:", sailBoats.getInfo());
console.log("yachts boats:", yachtBoats.getInfo());
