// roomsStore.spec.ts
import { setActivePinia, createPinia } from "pinia";
import { useRoomsStore } from "../src/stores/rooms";
import { api } from "../src/utils/api";
import { flushPromises } from "@vue/test-utils";

jest.mock("../src/utils/api");

describe("Rooms Store", () => {
  let store: ReturnType<typeof useRoomsStore>;

  beforeEach(() => {
    setActivePinia(createPinia());
    store = useRoomsStore();
  });

  it("should fetch and store rooms", async () => {
    // Mock de la respuesta del API
    const mockRooms = {
      data: {
        rooms: [
          { id: 1, name: "Room 1" },
          { id: 2, name: "Room 2" },
        ],
      },
    };
    (api.get as jest.Mock).mockResolvedValueOnce(mockRooms);

    // Ejecuta la acción
    await store.getRooms();
    await flushPromises();

    // Verifica si los datos han sido almacenados correctamente
    expect(store.rooms).toEqual(mockRooms.data.rooms);
  });

  it("should filter rooms based on parameters", async () => {
    const mockFilteredRooms = {
      data: {
        rooms: [{ id: 3, name: "Room 3" }],
      },
    };
    (api.get as jest.Mock).mockResolvedValueOnce(mockFilteredRooms);

    const filterData = { location: "city", guests: 2 };

    await store.filterRooms(filterData);
    await flushPromises();

    expect(api.get).toHaveBeenCalledWith("/search?location=city&guests=2");
    expect(store.rooms).toEqual(mockFilteredRooms.data.rooms);
  });

  it("should fetch and store providers", async () => {
    const mockProviders = {
      data: [
        { id: 1, name: "Provider 1" },
        { id: 2, name: "Provider 2" },
      ],
    };
    (api.get as jest.Mock).mockResolvedValueOnce(mockProviders);

    await store.getProviders();
    await flushPromises();

    expect(store.providers).toEqual(mockProviders.data);
  });
});
